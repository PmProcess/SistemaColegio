<?php

use App\Http\Controllers\Administracion\RolController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Personal\EmpleadoController;
use App\Http\Controllers\Personal\TipoEmpleadoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user())
    {
        return redirect()->route('Inicio');
    }
    else{
        return view('login.index');
    }
});

Auth::routes();
//--------Inicio de la Pagina
Route::prefix('Inicio')->group(function () {
    Route::get('/',[InicioController::class,'index'])->name('Inicio')->middleware('auth');
});

Route::prefix('tipoEmpleado')->middleware('auth')->group(function(){
    Route::get('/',[TipoEmpleadoController::class,'index'])->name('tipoEmpleado.index');
    Route::post('/store',[TipoEmpleadoController::class,'store'])->name('tipoEmpleado.store');
    Route::post('/update/{id}',[TipoEmpleadoController::class,'update'])->name('tipoEmpleado.update');
    Route::post('/destroy/{id}',[TipoEmpleadoController::class,'destroy'])->name('tipoEmpleado.destroy');
    Route::get('/getList',[TipoEmpleadoController::class,'getList'])->name('tipoEmpleado.getList');
});
Route::prefix('empleado')->middleware('auth')->group(function(){
    Route::get('/',[EmpleadoController::class,'index'])->name('empleado.index');
    Route::get('/create',[EmpleadoController::class,'create'])->name('empleado.create');
    Route::post('/store',[EmpleadoController::class,'store'])->name('empleado.store');
    Route::get('/edit/{id}',[EmpleadoController::class,'edit'])->name('empleado.edit');
    Route::post('/update/{id}',[EmpleadoController::class,'update'])->name('empleado.update');
    Route::post('/destroy/{id}',[EmpleadoController::class,'destroy'])->name('empleado.destroy');
    Route::get('/getList',[EmpleadoController::class,'getList'])->name('empleado.getList');
});

Route::prefix('rol')->middleware('auth')->group(function(){
    Route::get('/',[RolController::class,'index'])->name('rol.index');
    Route::get('/create',[RolController::class,'create'])->name('rol.create');
    Route::post('/store',[RolController::class,'store'])->name('rol.store');
    Route::get('/edit/{id}',[RolController::class,'edit'])->name('rol.edit');
    Route::post('/update/{id}',[RolController::class,'update'])->name('rol.update');
    Route::post('/destroy/{id}',[RolController::class,'destroy'])->name('rol.destroy');
    Route::get('/getList',[RolController::class,'getList'])->name('rol.getList');
});
