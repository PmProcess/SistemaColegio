<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearEscolar extends Model
{
    use HasFactory;
    protected $table="year_escolar";
    protected $fillable=[
        'year',
        'descripcion'
    ];
}
