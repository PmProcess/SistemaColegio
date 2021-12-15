<?php

namespace App\Http\Controllers;

use App\Models\Administracion\Grado;
use App\Models\Administracion\Curso;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GradoCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('administracion.grado.curso.index', ['cursos' => Grado::findOrFail($id)->cursos, 'idgrado' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $grado_id)
    {
        $grado = Grado::findOrFail($grado_id);
        DB::beginTransaction();
        try {
            $rules = [
                'curso' => ['required'],
                'descripcion' => 'required',
                'horas' => 'required'
            ];
            $mensaje = [
                'curso.required' => "El campo curso es obligatorio",
                'descripcion.required' => "El campo descripcion es obligatorio",
                'horas.required' => "El campo horas es requerido"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                //120508
                Session::flash("tipo", 'create');
                return redirect()->back()->withInput()->with("errores", $validator->errors());
            }
            $curso = Curso::where('curso', $request->curso);
            if ($curso->count() == 0) {
                $curso = Curso::create($request->only(['curso']));
                $grado->cursos()->attach($curso->id, [
                    'horas' => $request->horas,
                    'descripcion' => $request->descripcion,
                ]);
            } else {
                $curso = $curso->first();
                $grado->cursos()->attach($curso->id, ['horas' => $request->horas, 'descripcion' => $request->descripcion]);
            }
            DB::commit();
            return redirect()->route('grado.curso.index', ['id' => $grado_id]);
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("tipo", 'create');
            Log::info($e);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $grado_id)
    {
        $grado = Grado::findOrFail($grado_id);
        DB::beginTransaction();
        try {
            $rules = [
                'curso' => ['required'],
                'descripcion' => 'required',
                'horas' => 'required'
            ];
            $mensaje = [
                'curso.required' => "El campo curso es obligatorio",
                'descripcion.required' => "El campo descripcion es obligatorio",
                'horas.required' => "El campo horas es requerido"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                //120508
                Session::flash("id", $id);
                Session::flash("tipo", 'edit');
                return redirect()->back()->withInput()->with("errores", $validator->errors());
            }
            $curso = Curso::findOrFail($id);
            $curso->curso = $request->curso;
            $curso->save();
            $grado->cursos()->detach($curso->id);
            $grado->cursos()->attach($curso->id, ['horas' => $request->horas, 'descripcion' => $request->descripcion]);
            DB::commit();
            return redirect()->route('grado.curso.index', ['id' => $grado_id]);
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("id", $id);
            Session::flash("tipo", 'edit');
            Log::info($e);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $grado_id)
    {
        $grado = Grado::findOrFail($grado_id);
        $curso = Curso::findOrFail($id);
        $grado->cursos()->detach($curso->id);
        return redirect()->route('grado.curso.index', ['id' => $grado_id]);
    }
}
