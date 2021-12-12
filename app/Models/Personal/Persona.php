<?php

namespace App\Models\Personal;

use App\Models\Ubigeo\Distrito;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table="persona";
    protected $fillable=[
        'tipo_documento',
        'direccion',
        'telefono',
        'fecha_nacimiento',
        'genero',
        'distrito_id',
        'estado_civil',
        'estado'
    ];
    public function tipoPersona(){
        return  $this->hasOne($this->tipo_documento=="DNI"? PersonaDni::class:PersonaRuc::class,'persona_id');
    }
    public function empleado()
    {
        return $this->hasOne(Empleado::class,'persona_id');
    }
    public function personaDni(){
        return $this->hasOne(PersonaDni::class,'persona_id');
    }
    public function personaRuc(){
        return $this->hasOne(PersonaRuc::class,'persona_id');
    }
    public function distrito()
    {
        return $this->belongsTo(Distrito::class,'distrito_id');
    }

}
