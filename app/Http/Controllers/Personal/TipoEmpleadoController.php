<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Personal\TipoEmpleado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class TipoEmpleadoController extends Controller
{
    public function index()
    {
        return view('personal.tipoEmpleados.index');
    }
    public function getList()
    {
        $tipoEmpleados = TipoEmpleado::where('estado','ACTIVO')->get();
        return DataTables::of($tipoEmpleados)->toJson();
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            TipoEmpleado::create($request->all());
            DB::commit();
            return array("success" => true, "mensaje" => "Registro con Exito");
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            return array("success" => false, "mensaje" => $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            if (TipoEmpleado::where('id', '!=', $id)->where('tipo', $request->tipo)->count() != 0) {
                return array("success" => false, "mensaje" => "Ya esta registrado");
            }
            TipoEmpleado::findOrFail($id)->update($request->all());
            DB::commit();
            return array("success" => true, "mensaje" => "Actualizacion con Exito");
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            return array("success" => false, "mensaje" => $e->getMessage());
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            TipoEmpleado::findOrFail($id)->update([
                'estado' => "ANULADO"
            ]);
            DB::commit();
            return array("success" => true, "mensaje" => "Eliminacion con Exito");
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return array("success" => false, "mensaje" => $e->getMessage());
        }
    }
}
