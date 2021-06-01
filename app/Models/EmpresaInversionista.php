<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresaInversionista extends Model
{
    use HasFactory;

    protected $table= 'empresa_inversionista';
    protected $primarykey='id';

    protected $fillable = [
        'nombre',
        'informe',
        'logo',
        'monto_disponible',
        'monto_total',
        'fecha_esperada',
        'moneda_inversion'
    ];
}
