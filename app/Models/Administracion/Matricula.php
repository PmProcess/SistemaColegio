<?php

namespace App\Models\Administracion;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table="matricula";
    protected $fillable=[
        'alumno_id',
        'user_id',
        'grado_seccion_id',
        'year_escolar_id',
        'fecha_registro',
        'monto_total'
    ];
    public function alumno(){
        return $this->belongsTo(Alumno::class,'alumno_id');
    }
    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function gradoSeccion(){
        return $this->belongsTo(GradoSeccion::class,'grado_seccion_id');
    }
    public function yearEscolar(){
        return $this->belongsTo(YearEscolar::class,'year_escolar_id');
    }

}
