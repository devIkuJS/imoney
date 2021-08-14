<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaInversiones extends Model
{
    use HasFactory;

    protected $table= 'empresa_inversiones';
    protected $primarykey='id';

    protected $fillable = [
        'nombre',
        'numero_ruc',
        'informe',
        'logo',
        'monto_disponible',
        'monto_total',
        'tasa_anual',
        'tasa_mensual',
        'fecha_esperada',
        'moneda_inversion',
        'serie_num_comprobante'
    ];
}
