<?php

namespace App\Models;

use App\Models\Administracion\Matricula;
use App\Models\Administracion\TipoDocumento;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoPago extends Model
{
    use HasFactory;
    protected $table='documento_pago';
    protected $fillable=[
        'fecha_pago',
        'total',
        'tipo_documento_id',
        'matricula_id',
        'url_imagen',
        'nombre_imagen',
        'documento',
        'nombre_cliente',
        'estado'
        // 'cliente_id',
    ];
    public function matricula()
    {
        return $this->belongsTo(Matricula::class,'matricula_id');
    }
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class,'tipo_documento_id');
    }
}
