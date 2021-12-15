<?php

namespace App\Http\Controllers;

use App\Models\Administracion\Grado;
use App\Models\Administracion\Seccion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GradoSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('administracion.grado.seccion.index', ['secciones' => Grado::findOrFail($id)->secciones,'idgrado'=>$id]);
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
                'seccion' => ['required'],
                'descripcion' => 'required',
                'n_alumnos' => 'required'
            ];
            $mensaje = [
                'seccion.required' => "El campo seccion es obligatorio",
                'descripcion.required' => "El campo descripcion es obligatorio",
                'n_alumnos.required' => "El campo numero de alumnos es requerido"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                //120508
                Session::flash("tipo", 'create');
                return redirect()->back()->withInput()->with("errores", $validator->errors());
            }
            $seccion = Seccion::where('seccion', $request->seccion);
            if ($seccion->count()==0) {
                $seccion = Seccion::create($request->only(['seccion']));
                $grado->secciones()->attach($seccion->id, [
                    'n_alumnos' => $request->n_alumnos,
                    'descripcion' => $request->descripcion,
                    'url_imagen'=>$request->url_imagen,
                    'nombre_imagen'=>$request->nombre_imagen,
                ]);
            } else {
                $seccion=$seccion->first();
                $grado->secciones()->attach($seccion->id, ['n_alumnos' => $request->n_alumnos, 'descripcion' => $request->descripcion]);
            }
            DB::commit();
            return redirect()->route('grado.seccion.index', ['id' => $grado_id]);
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
    public function update(Request $request, $id,$grado_id)
    {
        Log::info($request);
        Log::info($id);
        Log::info($grado_id);
        $grado = Grado::findOrFail($grado_id);
        DB::beginTransaction();
        try {
            $rules = [
                'seccion' => ['required'],
                'descripcion' => 'required',
                'n_alumnos' => 'required'
            ];
            $mensaje = [
                'seccion.required' => "El campo seccion es obligatorio",
                'descripcion.required' => "El campo descripcion es obligatorio",
                'n_alumnos.required' => "El campo numero de alumnos es requerido"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                //120508
                Session::flash("tipo", 'create');
                return redirect()->back()->withInput()->with("errores", $validator->errors());
            }
            $seccion = Seccion::findOrFail($id);
            $seccion->seccion=$request->seccion;
            $seccion->save();
            $grado->secciones()->detach($seccion->id);
            $grado->secciones()->attach($seccion->id, ['n_alumnos' => $request->n_alumnos, 'descripcion' => $request->descripcion]);
            DB::commit();
            return redirect()->route('grado.seccion.index', ['id' => $grado_id]);
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("tipo", 'create');
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
    public function destroy($id,$grado_id)
    {
        $grado=Grado::findOrFail($grado_id);
        $seccion=Seccion::findOrFail($id);
        $grado->secciones()->detach($seccion->id);
        return redirect()->route('grado.seccion.index', ['id' => $grado_id]);
    }
}
