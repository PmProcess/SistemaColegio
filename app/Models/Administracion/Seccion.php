<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    protected $table="seccion";
    protected $fillable=[
        'seccion'
    ];
    public function grados()
    {
        return $this->belongsToMany(Grado::class,'grado_seccion','seccion_id','grado_id')->withTimestamps()->withPivot(['n_alumnos','descripcion']);
    }
}
