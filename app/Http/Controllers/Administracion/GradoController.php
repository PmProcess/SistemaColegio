<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Grado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.grado.index');
    }
    public function getList()
    {
        return DataTables::of(Grado::where('estado', 'ACTIVO')->get())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.grado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $rules = [
                'grado' => 'required|unique:grado,grado,',
                'descripcion' => 'required'
            ];
            $mensaje = [
                'grado.required' => 'El campo grado es Obligatorio',
                'grado.unique' => 'El campo grado debe ser unico',
                'descripcion.required' => 'El campo grado debe ser unico'
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                Session::flash("tipo", 'create');
                return redirect()->back()->withInput()->with('errores', $validator->errors());
            }
            Grado::create($request->all());
            DB::commit();
            return redirect()->route('grado.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            Session::flash("tipo", 'create');
            Session::flash("error", $e->getMessage());
            return redirect()->back()->withInput();
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
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $rules = [
                'grado' => 'required|unique:grado,grado,' . $id,
                'descripcion' => 'required'
            ];
            $mensaje = [
                'grado.required' => 'El campo grado es Obligatorio',
                'grado.unique' => 'El campo grado debe ser unico',
                'descripcion.required' => 'El campo descripcion es obligatorio'
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                Session::flash("id", $id);
                Session::flash("tipo", 'edit');
                return redirect()->back()->withInput()->with('errores', $validator->errors());
            }
            $grado = Grado::findOrFail($id);
            $grado->update($request->all());
            DB::commit();
            return redirect()->route('grado.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            Session::flash("id", $id);
            Session::flash("tipo", 'edit');
            Session::flash("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Grado::findOrFail($id)->update([
                'estado' => 'ANULADO'
            ]);
            DB::commit();
            return redirect()->route('grado.index');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("error", $e->getMessage());
            Log::info($e);
            return redirect()->back()->withInput();
        }
    }
}
