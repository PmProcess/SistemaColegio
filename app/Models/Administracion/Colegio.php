<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;
    protected $table="colegio";
    protected $fillable=[
        'ruc',
        'razon_social',
        'nombre_comercial',
        'direccion',
        'direccion_fiscal',
        'nombre_imagen',
        'url_imagen',
        'telefono',
        'correo'
    ];

}
