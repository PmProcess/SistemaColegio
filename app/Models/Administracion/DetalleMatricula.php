<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMatricula extends Model
{
    use HasFactory;
    protected $table="detalle_matricula";
    protected $fillable=[
        'grado_curso_id',
        'matricula_id'
    ];
    public function matricula(){
        return $this->belongsTo(Matricula::class,'matricula_id');
    }

}
