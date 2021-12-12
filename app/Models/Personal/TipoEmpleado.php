<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    use HasFactory;
    protected $table="tipo_empleado";
    protected $fillable=[
        'tipo','descripcion','estado'
    ];
    public $timestamps=true;
}
