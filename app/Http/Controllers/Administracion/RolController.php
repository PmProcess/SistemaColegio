<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Permission\Models\Permission;
use App\Permission\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.rol.index');
    }
    public function getList()
    {
        return  DataTables::of(Role::get())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.rol.create');
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
                'name' => 'required|max:50|unique:roles,name',
                'slug' => 'required|max:50|unique:roles,slug',
                'full-access' => 'required|in:yes,no',
                'description' => 'required'
            ];
            $mensaje = [
                'name.required' => "El nombre es requerido",
                'name.unique' => "El nombre debe ser unico",
                'slug.required' => "El alias es requerido",
                'slug.unique' => "El alias es unico",
                'full-access.required' => "Seleccione el full acceso",
                'description.required' => "La descripcion es requerida"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('errores', $validator->errors());
            }
            $role = Role::create($request->all());
            if ($request->get('permission')) {
                $role->permissions()->sync($request->get('permission'));
            } else {
                $role->permissions()->detach();
            }
            DB::commit();
            return redirect()->route('rol.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
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
        $rol = Role::findOrFail($id);
        $permissions_role = [];
        foreach ($rol->permissions as $permission) {
            $permissions_role[] = $permission->id;
        }
        $rol->permission=$permissions_role;

        return view('administracion.rol.edit', ['rol' => $rol]);
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
            $role = Role::findOrFail($id);
            $rules = [
                'name' => 'required|max:50|unique:roles,name,'.$id,
                'slug' => 'required|max:50|unique:roles,slug,'.$id,
                'full-access' => 'required|in:yes,no',
                'description' => 'required'
            ];
            $mensaje = [
                'name.required' => "El nombre es requerido",
                'name.unique' => "El nombre debe ser unico",
                'slug.required' => "El alias es requerido",
                'slug.unique' => "El alias es unico",
                'full-access.required' => "Seleccione el full acceso",
                'description.required' => "La descripcion es requerida"
            ];
            $validator = Validator::make($request->all(), $rules, $mensaje);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->with('errores', $validator->errors());
            }
            $role->update($request->all());
            if ($request->get('permission')) {
                $role->permissions()->sync($request->get('permission'));
            } else {
                $role->permissions()->detach();
            }
            DB::commit();
            return redirect()->route('rol.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            Session::flash('error',$e->getMessage());
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
        $role = Role::findOrFail($id);
        if ($role->eliminar == "yes") {
            $role->delete();
        }
        return redirect()->route('rol.index');
    }
}
