<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoSeccion extends Model
{
    use HasFactory;
    protected $table="grado_seccion";
    protected $fillable=[
        'grado_id',
        'seccion_id',
        'n_alumnos',
        'descripcion'
    ];
    public $timestamps=true;
}
