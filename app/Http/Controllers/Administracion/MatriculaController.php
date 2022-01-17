<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Colegio;
use App\Models\Administracion\DetalleMatricula;
use App\Models\Administracion\Matricula;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade as PDF;

class MatriculaController extends Controller
{
    public function index()
    {
        return view('administracion.matricula.index');
    }
    public function getList()
    {
        $matriculas = Matricula::with(['alumno.persona.personaDni', 'yearEscolar'])->get()->map(function ($matricula) {
            $matricula->n_cursos = DetalleMatricula::where('matricula_id', $matricula->id)->count();
            $matricula->gradoSeccion->seccion;
            $matricula->gradoSeccion->grado;
            $matricula->estado = $matricula->monto_total == $matricula->monto_deuda ? 'PENDIENTE' : 'PAGADO';
            return $matricula;
        });
        return DataTables::of($matriculas)->toJson();
    }
    public function create()
    {
        return view('administracion.matricula.create');
    }
    public function store(Request $request)
    {
        Log::info($request);
        DB::beginTransaction();
        try {
            $rules = [
                'alumno_id' => 'required',
                'grado_seccion_id' => 'required',
                'year_escolar_id' => 'required',
                'monto_total' => 'required|numeric|min:0|not_in:0',
            ];
            $mensaje = [
                'alumno_id.required' => 'El alumno es requerido',
                'grado_seccion_id.required' => 'La seccion es requerida',
                'year_escolar_id.required' => 'El año escolar es requerida',
                'monto_total.required' => "El monto total es requerido"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('errores', $validator->errors());
            }
            $d_request = $request->only(['alumno_id', 'grado_seccion_id', 'year_escolar_id', 'monto_total', 'fecha_registro']);
            $d_request['user_id'] = Auth::user()->id;
            $d_request['monto_deuda'] = $request->monto_total;
            $matricula = Matricula::create($d_request);
            foreach (json_decode($request->detalle_matricula) as $key => $value) {
                if ($value->estado == "SI") {
                    $detalle = new DetalleMatricula();
                    $detalle->matricula_id = $matricula->id;
                    $detalle->grado_curso_id = $value->id;
                    $detalle->save();
                }
            }
            DB::commit();
            return redirect()->route('matricula.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $matricula = Matricula::with(['alumno', 'yearEscolar', 'seccion'])->first();
        return view('administracion.matricula.edit', $matricula);
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $matricula = Matricula::findOrFail($id);
            $matricula->update($request->only(['alumno_id', 'seccion_id', 'year_escolar_id', 'monto_total']));
            DetalleMatricula::where('matricula_id', $matricula)->delete();
            foreach ($request->detalle_matricula as $key => $value) {
                $detalle = new DetalleMatricula();
                $detalle->matricula_id = $matricula->id;
                $detalle->grado_curso_id = $value->grado_curso_id;
                $detalle->save();
            }
            DB::commit();
            return redirect()->route('matricula.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back()->withInput();
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Matricula::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('matricula.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->back();
        }
    }
    public function pdf($id)
    {
        $matricula = Matricula::findOrFail($id);
        $colegio = Colegio::first();
        $pdf = PDF::loadview('reportes.matriculapago', [
            'matricula' => $matricula,
            'colegio' => $colegio
        ])->setPaper('a4')->setWarnings(false);
        return $pdf->stream();
    }
}
