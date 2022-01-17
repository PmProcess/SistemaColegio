<?php

namespace App\Http\Controllers;

use App\Models\Administracion\Matricula;
use App\Models\Cliente;
use App\Models\DocumentoPago;
use App\Models\Personal\Persona;
use App\Models\Personal\PersonaDni;
use App\Models\Personal\PersonaRuc;
use App\Rules\RuleTotal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;

class MatriculaPagoController extends Controller
{
    public function index($id)
    {
        $matricula = Matricula::findOrFail($id);
        $pagos = $matricula->pagos()->with(['tipoDocumento'])->where('estado','ACTIVO')->get();
        return view('administracion.matricula.pago.index', compact('pagos', 'matricula'));
    }
    // public function  storeCliente(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $rules = [
    //             "distrito_id" => "required",
    //             "direccion" => "required",
    //             "tipo_documento" => "required",
    //             "documento"=>"required"
    //         ];
    //         $mensaje = [
    //             "distrito_id.required" => "El distrito es requerido",
    //             "direccion.required" => "La direccion es requerido",
    //             "tipo_documento.required" => "El tipo de documento es requerido",
    //             "documento.required"=>"El documento es obligatorio"
    //         ];
    //         if ($request->tipo_documento == "DNI") {
    //             $rules += [
    //                 'nombres' => 'required',
    //                 'apellidos' => 'required',
    //             ];
    //             $mensaje += [
    //                 'nombres.required' => "El nombre es obligatorio",
    //                 "apellidos.required" => "Los apellidos son obligatorio",
    //             ];
    //         } else {
    //             $rules += [
    //                 'nombre_comercial' => 'required',
    //             ];
    //             $mensaje += [
    //                 'nombre_comercial.required' => 'El nombre comercial es obligatorio',
    //             ];
    //         }
    //         $validator = Validator::make($request->all(), $rules, $mensaje);
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'errors' => $validator->errors(),
    //                 "mensaje"=>"Ocurrio un error"
    //             ]);
    //         }

    //         $persona = Persona::create($request->only([
    //             'tipo_documento',
    //             'direccion',
    //             'telefono',
    //             'distrito_id',
    //         ]));
    //         if ($request->tipo_documento == "DNI") {
    //             $r_dni = $request->only(['nombres', 'apellidos']);
    //             $r_dni['persona_id'] = $persona->id;
    //             $r_dni['dni']=$request->documento;
    //             PersonaDni::create($r_dni);
    //         } else {
    //             $r_ruc = $request->only(['nombre_comercial']);
    //             $r_ruc['persona_id'] = $persona->id;
    //             $r_ruc['ruc'] = $request->documento;
    //             PersonaRuc::create($r_ruc);
    //         }
    //         DB::commit();
    //         return response()->json(['errors'=>null,"mensaje"=>"Registro con Exito"]);
    //     } catch (Exception $e) {
    //         Log::info($e);
    //         DB::rollBack();
    //         return response()->json(['errors'=>$e->getMessage(),"mensaje"=>"Ocurrio un error"]);
    //     }
    // }
    public function store(Request $request, $matricula_id)
    {
        Log::info($request);
        DB::beginTransaction();
        $matricula = Matricula::findOrFail($matricula_id);
        try {
            $rules = [
                "tipo_documento_id" => "required",
                "documento" => "required",
                "nombre_cliente" => "required",
                "total" => ["required",new RuleTotal($matricula->monto_deuda)]
            ];
            $mensaje = [
                "tipo_documento_id.required" => "El tipo de documento es obligatorio",
                "documento.required" => "El documento es obligatorio",
                "nombre_cliente.required" => "El nombre es obligatorio",
                "total.required" => "El total es requerido"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                Session::flash('vista','create');
                return redirect()->back()->withInput()->with("validaciones", $validator->errors());
            }
            $r_pago = $request->only(['tipo_documento_id', 'documento', 'nombre_cliente', 'total']);
            $r_pago['fecha_pago'] = date('Y-m-d');
            $r_pago['matricula_id'] = $matricula_id;
            $documentoPago = DocumentoPago::create($r_pago);
            if ($request->hasFile('avatar')) {
                $documentoPago->url_imagen = $request->file('avatar')->store('public/documentopago');
                $documentoPago->nombre_imagen = $request->file('avatar')->getClientOriginalName();
                $documentoPago->pago;
            }

            $matricula->monto_deuda -= $documentoPago->total;
            $matricula->save();
            if ($matricula->monto_deuda == 0) {
                $matricula->estado_pago = "PAGADO";
                $matricula->save();
            }
            DB::commit();
            return redirect()->route('matricula.pago.index', $matricula_id);
        } catch (Exception $e) {
            Log::info($e);

            Session::flash('vista','create');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
    }
    public function update(Request $request, $id, $matricula_id)
    {
        DB::beginTransaction();
        $matricula = Matricula::findOrFail($matricula_id);
        $documentoPago = DocumentoPago::findOrFail($id);
        Log::info($request);
        try {
            $rules = [
                "tipo_documento_id" => "required",
                "documento" => "required",
                "nombre_cliente" => "required",
                "total" => ["required",new RuleTotal($matricula->monto_deuda,'update',$documentoPago->total)]
            ];
            $mensaje = [
                "tipo_documento_id.required" => "El tipo de documento es obligatorio",
                "documento.required" => "El documento es obligatorio",
                "nombre_cliente.required" => "El nombre es obligatorio",
                "total.required" => "El total es requerido"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                Session::flash('elemento',$documentoPago);
                Session::flash('vista','update');
                return redirect()->back()->withInput()->with("validaciones", $validator->errors());
            }
            $matricula->monto_deuda += $documentoPago->total;
            $matricula->save();
            if ($matricula->monto_deuda == 0) {
                $matricula->estado_pago = "PAGADO";
                $matricula->save();
            }
            else{
                $matricula->estado_pago = "PENDIENTE";
                $matricula->save();
            }
            $r_pago = $request->only(['tipo_documento_id', 'documento', 'nombre_cliente', 'total']);
            $r_pago['fecha_pago'] = date('Y-m-d');
            $documentoPago->update($r_pago);
            if ($request->hasFile('avatar')) {
                if($documentoPago->url_imagen!=null)
                {
                    Storage::delete($documentoPago->url_imagen);
                }
                $documentoPago->url_imagen = $request->file('avatar')->store('public/documentopago');
                $documentoPago->nombre_imagen = $request->file('avatar')->getClientOriginalName();
                $documentoPago->pago;
            }
            $documentoPago->save();

            $matricula->monto_deuda -= $documentoPago->total;
            $matricula->save();
            if ($matricula->monto_deuda == 0) {
                $matricula->estado_pago = "PAGADO";
                $matricula->save();
            }
            else{
                $matricula->estado_pago = "PENDIENTE";
                $matricula->save();
            }
            DB::commit();
            return redirect()->route('matricula.pago.index', $matricula_id);
        } catch (Exception $e) {
            Log::info($e);
            DB::rollBack();
            Session::flash('elemento',$documentoPago);
            Session::flash('vista','update');
            return redirect()->back()->withInput();
        }
    }
    public function destroy($id, $matricula_id)
    {
        $documentoPago = DocumentoPago::findOrFail($id);
        $documentoPago->estado = "ANULADO";
        $documentoPago->save();
        $matricula = $documentoPago->matricula;
        $matricula->monto_deuda += $documentoPago->total;
        $matricula->save();
        return redirect()->route('matricula.pago.index', $matricula_id);
    }
}
