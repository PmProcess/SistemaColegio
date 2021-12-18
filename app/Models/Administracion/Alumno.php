<?php

namespace App\Models\Administracion;

use App\Models\Personal\Persona;
use App\Models\User;
use Faker\Provider\ar_JO\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table="alumno";
    protected $fillable=[
        'persona_id',
        'user_id',
        'url_imagen',
        'nombre_imagen'
    ];
    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
