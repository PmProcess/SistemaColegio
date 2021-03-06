<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoCurso extends Model
{
    use HasFactory;
    protected $table="grado_curso";
    protected $fillable=[
        'horas',
        'descripcion'
    ];
    protected $timestamps=true;
}
