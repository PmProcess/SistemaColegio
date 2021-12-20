<?php

use App\Models\Administracion\Alumno;
use App\Models\Administracion\Curso;
use App\Models\Administracion\Grado;
use App\Models\Administracion\YearEscolar;
use App\Models\Personal\TipoEmpleado;
use App\Models\Ubigeo\Departamento;
use App\Models\Ubigeo\Distrito;
use App\Models\Ubigeo\Provincia;
use App\Permission\Models\Permission;

if (!function_exists('departamentos')) {
    function departamentos()
    {
        return Departamento::get();
    }
}
if (!function_exists('provincias')) {
    function provincias()
    {
        return Provincia::with(['departamento'])->get();
    }
}
if (!function_exists('distritos')) {
    function distritos()
    {
        return Distrito::with(['provincia'])->get();
    }
}
if (!function_exists('tipoEmpleados')) {
    function tipoEmpleados()
    {
        return TipoEmpleado::get();
    }
}
if(!function_exists('permisos'))
{
    function permisos(){
        return Permission::get();
    }
}
if(!function_exists('alumnos'))
{
    function alumnos(){
        return Alumno::with(['persona.personaDni'])->get();
    }
}
if(!function_exists('grados'))
{
    function grados(){
        return Grado::where('estado','ACTIVO')->with(['cursos','secciones'])->get();
    }
}
if(!function_exists('gradoEscolar')){
    function gradoEscolar(){
        return YearEscolar::get();
    }
}
