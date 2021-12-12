<?php

use App\Models\Personal\TipoEmpleado;
use App\Models\Ubigeo\Departamento;
use App\Models\Ubigeo\Distrito;
use App\Models\Ubigeo\Provincia;

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
