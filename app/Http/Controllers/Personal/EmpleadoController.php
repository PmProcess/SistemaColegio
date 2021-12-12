<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Personal\Empleado;
use App\Models\Personal\Persona;
use App\Models\Personal\PersonaDni;
use App\Models\Personal\PersonaRuc;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Yajra\DataTables\Facades\DataTables;

class EmpleadoController extends Controller
{
    public function getList()
    {
        $empleados = Empleado::with(['persona', 'tipoEmpleado'])->get()->filter(function ($empleado) {
            $empleado->persona->tipoPersona;
            return $empleado->persona->estado == "ACTIVO";
        });
        return DataTables::of($empleados)->toJson();
    }
    public function index()
    {
        return view('personal.empleado.index');
    }
    public function create()
    {
        return view('personal.empleado.create');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $rules = [
                "tipo_documento" => "required",
                "distrito_id" => "required",
                "direccion" => "required",
                "telefono" => "required",
                "fecha_nacimiento" => "required",
                "genero" => "required",
                "distrito_id" => "required",
                "estado_civil" => "required",
                'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')->where(function ($query) {
                })],
                'password' => ['required', 'same:confirm_password'],
                'confirm_password' => 'required',
            ];
            $mensaje = [
                "distrito_id.required" => "El distrito es obligatorio",
                "tipo_documento.required" => "El tipo de documento es obligatorio",
                "direccion.required" => "La direccion es obligatorio",
                "telefono.required" => "El telefono es obligatorio",
                "fecha_nacimiento.required" => "La Fecha de Nacimiento es obligatorio",
                "genero.required" => "El genero es obligatorio",
                "distrito.required" => "El distrito es obligatorio",
                "estado_civil.required" => "El estado civil es obligatorio",
                'email.required' => 'El Campo email es Obligatorio',
                'email.unique' => 'El Campo email ya esta registrado',
                'email.email' => 'formato no valido',
                'genero.required' => 'El Campo genero es Obligatorio',
                'password.required' => 'El Campo password es Obligatorio',
                'password.same' => 'No coinciden los campos de contraseña',
                'confirm_password.required' => 'El Campo password es Obligatorio',
            ];
            if ($request->tipo_documento == "DNI") {
                $rules += [
                    'nombres' => 'required',
                    'apellidos' => 'required',
                    'dni' => ['required', 'unique:persona_dni,dni']
                ];
                $mensaje += [
                    'nombres.required' => "El nombre es obligatorio",
                    "apellidos.required" => "Los apellidos son obligatorio",
                    "dni.required" => "El dni es obligatorio",
                    "dni.unique" => "El dni ya esta registrado"
                ];
            } else {
                $rules += [
                    'nombre_comercial' => 'required',
                    'ruc' => ['required', 'unique:persona_ruc,ruc']
                ];
                $mensaje += [
                    'nombre_comercial.required' => 'El nombre comercial es obligatorio',
                    'ruc.required' => 'El ruc es obligatorio',
                    'ruc.unique' => 'El ruc ya esta registrado'
                ];
            }

            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('errores', $validator->errors());
            }
            $persona = Persona::create($request->only([
                'tipo_documento',
                'direccion',
                'telefono',
                'fecha_nacimiento',
                'genero',
                'distrito_id',
                'estado_civil',
            ]));
            if ($request->tipo_documento == "DNI") {
                $r_dni = $request->only(['nombres', 'apellidos', 'dni']);
                $r_dni['persona_id'] = $persona->id;
                PersonaDni::create($r_dni);
            } else {
                $r_ruc = $request->only(['nombre_comercial', 'ruc']);
                $r_ruc['persona_id'] = $persona->id;
                PersonaRuc::create($r_ruc);
            }
            $usuario = new User();
            $usuario->name = $request->email;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->save();
            $empleado = new Empleado();
            $empleado->tipo_id = $request->tipo_id;
            $empleado->persona_id = $persona->id;
            $empleado->user_id = $usuario->id;
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $empleado->nombre_imagen = $name;
                $empleado->url_imagen = $request->file('avatar')->store('public/empleados');
            }
            $empleado->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }
    public function edit($id)
    {

        $empleado = Empleado::where('id', $id)->get()->map(function ($empleado) {
            $empleado->direccion = $empleado->persona->direccion;
            $empleado->distrito_id = $empleado->persona->distrito_id;
            $empleado->estado_civil = $empleado->persona->estado_civil;
            $empleado->fecha_nacimiento = $empleado->persona->fecha_nacimiento;
            $empleado->genero = $empleado->persona->genero;
            $empleado->telefono = $empleado->persona->telefono;
            $empleado->tipo_documento = $empleado->persona->tipo_documento;
            $empleado->dni = $empleado->persona->personaDni ? $empleado->persona->personaDni->dni : null;
            $empleado->nombres = $empleado->persona->personaDni ? $empleado->persona->personaDni->nombres : null;
            $empleado->apellidos = $empleado->persona->personaDni ? $empleado->persona->personaDni->apellidos : null;
            $empleado->ruc = $empleado->persona->personaRuc ? $empleado->persona->personaRuc->ruc : null;
            $empleado->nombre_comercial = $empleado->persona->personaRuc ? $empleado->persona->personaRuc->nombre_comercial : null;
            $empleado->confirm_password = null;
            $empleado->password = null;
            $empleado->email = $empleado->user->email;
            unset($empleado->persona);
            unset($empleado->user);
            return $empleado;
        });
        return view('personal.empleado.edit', ['empleado' => $empleado]);
    }
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        DB::beginTransaction();
        try {
            $rules = [
                "tipo_documento" => "required",
                "direccion" => "required",
                "telefono" => "required",
                "fecha_nacimiento" => "required",
                "genero" => "required",
                "distrito_id" => "required",
                "estado_civil" => "required",
                'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')->ignore($empleado->user->id)],
            ];
            $mensaje = [
                "tipo_documento.required" => "El tipo de documento es obligatorio",
                "direccion.required" => "La direccion es obligatorio",
                "telefono.required" => "El telefono es obligatorio",
                "fecha_nacimiento.required" => "La Fecha de Nacimiento es obligatorio",
                "genero.required" => "El genero es obligatorio",
                "distrito.required" => "El distrito es obligatorio",
                "estado_civil.required" => "El estado civil es obligatorio",
                'email.required' => 'El Campo email es Obligatorio',
                'email.unique' => 'El Campo email ya esta registrado',
                'email.email' => 'formato no valido',
                'genero.required' => 'El Campo genero es Obligatorio',
            ];
            if ($request->tipo_documento == "DNI") {
                $rules += [
                    'nombres' => 'required',
                    'apellidos' => 'required',
                    'dni' => ['required', $empleado->persona->personaDni ? Rule::unique('persona_dni')->ignore($empleado->persona->personaDni->id) : 'unique:persona_dni,dni']
                ];
                $mensaje += [
                    'nombres.required' => "El nombre es obligatorio",
                    "apellidos.required" => "Los apellidos son obligatorio",
                    "dni.required" => "El dni es obligatorio",
                    "dni.unique" => "El dni ya esta registrado"
                ];
            } else {
                $rules += [
                    'nombre_comercial' => 'required',
                    'ruc' => ['required', ['required', $empleado->persona->personaRuc ? Rule::unique('persona_ruc')->ignore($empleado->persona->personaRuc->id) : 'unique:persona_ruc,ruc']]
                ];
                $mensaje += [
                    'nombre_comercial.required' => 'El nombre comercial es obligatorio',
                    'ruc.required' => 'El ruc es obligatorio',
                    'ruc.unique' => 'El ruc ya esta registrado'
                ];
            }
            if ($empleado->user->email != $request->get('email')) {
                $rules += [
                    'password' => ['required', 'same:confirm_password'],
                    'confirm_password' => 'required',
                ];
                $mensaje += [
                    'password.required' => 'El Campo password es Obligatorio',
                    'password.same' => 'No coinciden los campos de contraseña',
                    'confirm_password.required' => 'El Campo password es Obligatorio',
                ];
            }

            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('errores', $validator->errors());
            }
            $persona = $empleado->persona;
            $persona->update($request->only([
                'tipo_documento',
                'direccion',
                'telefono',
                'fecha_nacimiento',
                'genero',
                'distrito_id',
                'estado_civil',
            ]));
            if ($request->tipo_documento == "DNI") {
                $r_dni = $request->only(['nombres', 'apellidos', 'dni']);
                $r_dni['persona_id'] = $persona->id;
                $persona_dni = $persona->personaDni;
                if ($persona_dni) {
                    $persona_dni->update($r_dni);
                } else {
                    PersonaRuc::findOrFail($persona->personaRuc->id)->delete();
                    PersonaDni::create($r_dni);
                }
            } else {
                $r_ruc = $request->only(['nombre_comercial', 'ruc']);
                $r_ruc['persona_id'] = $persona->id;
                $persona_ruc = $persona->personaRuc;
                if ($persona_ruc) {
                    $persona_ruc->update($r_ruc);
                } else {
                    PersonaDni::findOrFail($persona->personaDni->id)->delete();
                    PersonaRuc::create($r_ruc);
                }
            }
            if ($empleado->user->email != $request->get('email')) {
                $usuario = $empleado->user();
                $usuario->name = $request->email;
                $usuario->email = $request->email;
                $usuario->password = bcrypt($request->password);
                $usuario->save();
            }
            $empleado->tipo_id = $request->tipo_id;
            $empleado->persona_id = $persona->id;
            if ($request->hasFile('logo')) {
                unlink(storage_path($empleado->url_imagen));
                $file = $request->file('logo');
                $name = $file->getClientOriginalName();
                $empleado->nombre_imagen = $name;
                $empleado->url_imagen = $request->file('logo')->store('public/empleados');
            }
            $empleado->save();
            DB::commit();
            return redirect()->route('empleado.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Empleado::findOrFail($id)->persona->update([
                'estado' => 'ANULADO'
            ]);
            DB::commit();
            return redirect()->route('empleado.index');
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
