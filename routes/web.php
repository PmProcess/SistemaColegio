<?php

use App\Http\Controllers\Administracion\AlumnoController;
use App\Http\Controllers\Administracion\GradoController;
use App\Http\Controllers\Administracion\RolController;
use App\Http\Controllers\GradoCursoController;
use App\Http\Controllers\GradoSeccionController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Personal\EmpleadoController;
use App\Http\Controllers\Personal\TipoEmpleadoController;
use App\Models\Administracion\Grado;
use App\Models\Administracion\Seccion;
use App\Permission\Models\Role;
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
    if (Auth::user()) {
        return redirect()->route('Inicio');
    } else {
        return view('login.index');
    }
});

Auth::routes();
//--------Inicio de la Pagina
Route::prefix('Inicio')->group(function () {
    Route::get('/', [InicioController::class, 'index'])->name('Inicio')->middleware('auth');
});

Route::prefix('tipoEmpleado')->middleware('auth')->group(function () {
    Route::get('/', [TipoEmpleadoController::class, 'index'])->name('tipoEmpleado.index');
    Route::post('/store', [TipoEmpleadoController::class, 'store'])->name('tipoEmpleado.store');
    Route::post('/update/{id}', [TipoEmpleadoController::class, 'update'])->name('tipoEmpleado.update');
    Route::post('/destroy/{id}', [TipoEmpleadoController::class, 'destroy'])->name('tipoEmpleado.destroy');
    Route::get('/getList', [TipoEmpleadoController::class, 'getList'])->name('tipoEmpleado.getList');
});
Route::prefix('empleado')->middleware('auth')->group(function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('empleado.index');
    Route::get('/create', [EmpleadoController::class, 'create'])->name('empleado.create');
    Route::post('/store', [EmpleadoController::class, 'store'])->name('empleado.store');
    Route::get('/edit/{id}', [EmpleadoController::class, 'edit'])->name('empleado.edit');
    Route::post('/update/{id}', [EmpleadoController::class, 'update'])->name('empleado.update');
    Route::post('/destroy/{id}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');
    Route::get('/getList', [EmpleadoController::class, 'getList'])->name('empleado.getList');
});
Route::prefix('alumno')->middleware('auth')->group(function (){
    Route::get('/', [AlumnoController::class, 'index'])->name('alumno.index');
    Route::get('/create', [AlumnoController::class, 'create'])->name('alumno.create');
    Route::post('/store', [AlumnoController::class, 'store'])->name('alumno.store');
    Route::get('/edit/{id}', [AlumnoController::class, 'edit'])->name('alumno.edit');
    Route::post('/update/{id}', [AlumnoController::class, 'update'])->name('alumno.update');
    Route::post('/destroy/{id}', [AlumnoController::class, 'destroy'])->name('alumno.destroy');
    Route::get('/getList', [AlumnoController::class, 'getList'])->name('alumno.getList');
});
Route::prefix('rol')->middleware('auth')->group(function () {
    Route::get('/', [RolController::class, 'index'])->name('rol.index');
    Route::get('/create', [RolController::class, 'create'])->name('rol.create');
    Route::post('/store', [RolController::class, 'store'])->name('rol.store');
    Route::get('/edit/{id}', [RolController::class, 'edit'])->name('rol.edit');
    Route::post('/update/{id}', [RolController::class, 'update'])->name('rol.update');
    Route::post('/destroy/{id}', [RolController::class, 'destroy'])->name('rol.destroy');
    Route::get('/getList', [RolController::class, 'getList'])->name('rol.getList');
});

Route::prefix('grado')->middleware('auth')->group(function () {
    Route::get('/', [GradoController::class, 'index'])->name('grado.index');
    Route::post('/store', [GradoController::class, 'store'])->name('grado.store');
    Route::post('/update/{id}', [GradoController::class, 'update'])->name('grado.update');
    Route::post('/destroy/{id}', [GradoController::class, 'destroy'])->name('grado.destroy');
    Route::get('/getList', [GradoController::class, 'getList'])->name('grado.getList');

    Route::prefix('seccion')->middleware('auth')->group(function () {
        Route::get('/{id}', [GradoSeccionController::class, 'index'])->name('grado.seccion.index');
        Route::post('/store/{grado_id}', [GradoSeccionController::class, 'store'])->name('grado.seccion.store');
        Route::post('/update/{id}/{grado_id}', [GradoSeccionController::class, 'update'])->name('grado.seccion.update');
        Route::get('/destroy/{id}/{grado_id}', [GradoSeccionController::class, 'destroy'])->name('grado.seccion.destroy');
        Route::get('/getList/{id}', [GradoSeccionController::class, 'index'])->name('grado.seccion.getList');
    });
    Route::prefix('curso')->middleware('auth')->group(function () {
        Route::get('/{id}', [GradoCursoController::class, 'index'])->name('grado.curso.index');
        Route::post('/store/{grado_id}', [GradoCursoController::class, 'store'])->name('grado.curso.store');
        Route::post('/update/{id}/{grado_id}', [GradoCursoController::class, 'update'])->name('grado.curso.update');
        Route::get('/destroy/{id}/{grado_id}', [GradoCursoController::class, 'destroy'])->name('grado.curso.destroy');
        Route::get('/getList/{id}', [GradoCursoController::class, 'index'])->name('grado.curso.getList');
    });
});
