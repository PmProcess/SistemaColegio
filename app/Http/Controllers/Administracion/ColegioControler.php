<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Colegio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ColegioControler extends Controller
{
    public function index()
    {
        $colegio=Colegio::findOrFail(1);
        return view('administracion.colegio.index',['colegio'=>$colegio]);
    }
    public function store(Request $request)
    {
        Log::info($request);
        DB::beginTransaction();
        try{
            $colegio=Colegio::findOrFail(1);
            $colegio->update($request->only('ruc','razon_social','telefono','correo','direccion'));
            if($request->hasFile('avatar'))
            {
                $colegio->url_imagen=$request->file('avatar')->store('public/colegio');
                $colegio->nombre_imagen=$request->file('avatar')->getClientOriginalName();
                $colegio->save();
            }

            DB::commit();
            return redirect()->route('colegio.index');
        }
        catch(Exception $e)
        {
            DB::rollback();
            Log::info($e);
            return redirect()->back()->withInput();
        }
    }
}
