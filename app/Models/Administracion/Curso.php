<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table="curso";
    protected $fillable=[
        'curso'
    ];
    public function grados(){
        return $this->belongsToMany(Grado::class,'grado_curso','curso_id','grado_id')->withTimestamps()->withPivot(['horas','descripcion']);
    }


}
