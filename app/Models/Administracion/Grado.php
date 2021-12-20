<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $table = "grado";
    protected $fillable = [
        'grado',
        'descripcion',
        'estado'
    ];
    public $timestamps = true;
    public function secciones()
    {
        return $this->belongsToMany(Seccion::class,'grado_seccion','grado_id','seccion_id')->withTimestamps()->withPivot(['n_alumnos','descripcion','id']);
    }
    public function cursos()
    {
        return $this->belongsToMany(Curso::class,'grado_curso','grado_id','curso_id')->withTimestamps()->withPivot(['horas','descripcion','id']);
    }
}
