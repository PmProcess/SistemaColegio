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
}
