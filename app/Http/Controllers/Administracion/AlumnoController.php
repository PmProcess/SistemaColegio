<?php
namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Alumno;
use App\Models\Personal\Persona;
use App\Models\Personal\PersonaDni;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
class AlumnoController extends Controller
{
    public function getList()
    {
        $alumnos = Alumno::with(['persona'])->get()->filter(function ($alumno) {
            $alumno->persona->tipoPersona;
            return $alumno->persona->estado == "ACTIVO";
        });
        return DataTables::of($alumnos)->toJson();
    }
    public function index()
    {
        return view('administracion.alumno.index');
    }
    public function create()
    {
        return view('administracion.alumno.create');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $rules = [
                "distrito_id" => "required",
                "direccion" => "required",
                "telefono" => "required",
                "fecha_nacimiento" => "required",
                "genero" => "required",
                "distrito_id" => "required",
                'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')->where(function ($query) {
                })],
                'password' => ['required', 'same:confirm_password'],
                'confirm_password' => 'required',
            ];
            $mensaje = [
                "distrito_id.required" => "El distrito es obligatorio",
                "direccion.required" => "La direccion es obligatorio",
                "telefono.required" => "El telefono es obligatorio",
                "fecha_nacimiento.required" => "La Fecha de Nacimiento es obligatorio",
                "genero.required" => "El genero es obligatorio",
                "distrito.required" => "El distrito es obligatorio",
                'email.required' => 'El Campo email es Obligatorio',
                'email.unique' => 'El Campo email ya esta registrado',
                'email.email' => 'formato no valido',
                'genero.required' => 'El Campo genero es Obligatorio',
                'password.required' => 'El Campo password es Obligatorio',
                'password.same' => 'No coinciden los campos de contraseña',
                'confirm_password.required' => 'El Campo password es Obligatorio',
            ];
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
            ]));
                $r_dni = $request->only(['nombres', 'apellidos', 'dni']);
                $r_dni['persona_id'] = $persona->id;
                PersonaDni::create($r_dni);
            $usuario = new User();
            $usuario->name = $request->email;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->save();
            $alumno = new Alumno();
            $alumno->persona_id = $persona->id;
            $alumno->user_id = $usuario->id;
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $alumno->nombre_imagen = $name;
                $alumno->url_imagen = $request->file('avatar')->store('public/alumnos');
            }
            $alumno->save();
            DB::commit();
            return redirect()->route('alumno.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $alumno = Alumno::where('id', $id)->get()->map(function ($alumno) {
            $alumno->direccion = $alumno->persona->direccion;
            $alumno->distrito_id = $alumno->persona->distrito_id;
            $alumno->fecha_nacimiento = $alumno->persona->fecha_nacimiento;
            $alumno->genero = $alumno->persona->genero;
            $alumno->telefono = $alumno->persona->telefono;
            $alumno->tipo_documento = $alumno->persona->tipo_documento;
            $alumno->dni = $alumno->persona->personaDni ? $alumno->persona->personaDni->dni : null;
            $alumno->nombres = $alumno->persona->personaDni ? $alumno->persona->personaDni->nombres : null;
            $alumno->apellidos = $alumno->persona->personaDni ? $alumno->persona->personaDni->apellidos : null;
            $alumno->confirm_password = null;
            $alumno->password = null;
            $alumno->email = $alumno->user->email;
            unset($alumno->persona);
            unset($alumno->user);
            return $alumno;
        });
        return view('administracion.alumno.edit', ['alumno' => $alumno]);
    }
    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        DB::beginTransaction();
        try {
            $rules = [
                "tipo_documento" => "required",
                "direccion" => "required",
                "telefono" => "required",
                "fecha_nacimiento" => "required",
                "genero" => "required",
                "distrito_id" => "required",
                'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')->ignore($alumno->user->id)],
            ];
            $mensaje = [
                "tipo_documento.required" => "El tipo de documento es obligatorio",
                "direccion.required" => "La direccion es obligatorio",
                "telefono.required" => "El telefono es obligatorio",
                "fecha_nacimiento.required" => "La Fecha de Nacimiento es obligatorio",
                "genero.required" => "El genero es obligatorio",
                "distrito.required" => "El distrito es obligatorio",
                'email.required' => 'El Campo email es Obligatorio',
                'email.unique' => 'El Campo email ya esta registrado',
                'email.email' => 'formato no valido',
                'genero.required' => 'El Campo genero es Obligatorio',
            ];
                $rules += [
                    'nombres' => 'required',
                    'apellidos' => 'required',
                    'dni' => ['required',  Rule::unique('persona_dni')->ignore($alumno->persona->personaDni->id) ]
                ];
                $mensaje += [
                    'nombres.required' => "El nombre es obligatorio",
                    "apellidos.required" => "Los apellidos son obligatorio",
                    "dni.required" => "El dni es obligatorio",
                    "dni.unique" => "El dni ya esta registrado"
                ];
            if ($alumno->user->email != $request->get('email')) {
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
            $persona = $alumno->persona;
            $persona->update($request->only([
                'tipo_documento',
                'direccion',
                'telefono',
                'fecha_nacimiento',
                'genero',
                'distrito_id',
            ]));
                $r_dni = $request->only(['nombres', 'apellidos', 'dni']);
                $r_dni['persona_id'] = $persona->id;
                $persona_dni = $persona->personaDni;
                    $persona_dni->update($r_dni);
            if ($alumno->user->email != $request->get('email')) {
                $usuario = $alumno->user();
                $usuario->name = $request->email;
                $usuario->email = $request->email;
                $usuario->password = bcrypt($request->password);
                $usuario->save();
            }
            $alumno->persona_id = $persona->id;
            if ($request->hasFile('avatar')) {
                unlink(storage_path($alumno->url_imagen));
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $alumno->nombre_imagen = $name;
                $alumno->url_imagen = $request->file('avatar')->store('public/alumnos');
            }
            $alumno->save();
            DB::commit();
            return redirect()->route('alumno.index');
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
            Alumno::findOrFail($id)->persona->update([
                'estado' => 'ANULADO'
            ]);
            DB::commit();
            return redirect()->route('alumno.index');
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
