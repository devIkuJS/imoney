<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCuenta extends Model
{
    use HasFactory;
    protected $table= 'estado_cuentas';
    protected $primarykey='id';

    protected $fillable = [
        'numero_ruc',   
        'documento',
    ];
}
