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
    public function grado()
    {
        return $this->belongsTo(Grado::class,'grado_id');
    }
    public function seccion()
    {
        return $this->belongsTo(Seccion::class,'seccion_id');
    }
}
