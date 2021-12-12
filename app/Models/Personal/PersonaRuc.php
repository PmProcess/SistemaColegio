<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaRuc extends Model
{
    use HasFactory;
    protected $table="persona_ruc";
    protected $fillable=[
        'persona_id',
        'nombre_comercial',
        'ruc'
    ];
    public $timestamps=true;
    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id');
    }
}
