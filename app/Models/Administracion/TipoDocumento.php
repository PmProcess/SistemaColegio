<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    protected $table="tipo_documento";
    protected $fillable=[
        'tipo'
    ];
    public $timestamps=true;

}
