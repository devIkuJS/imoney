<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanciamientoEmpresa extends Model
{
    use HasFactory;

    protected $table= 'financiamiento_empresas';
    protected $primarykey='id';

    protected $fillable = [
        'user_id',   
        'factura',
        'copia_literal',
        'cotizacion',
        'ficha_cliente',
        'ficha_inmobiliario',
    ];
}
