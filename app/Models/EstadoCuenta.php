<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCuenta extends Model
{
    use HasFactory;
    protected $table= 'estado_cuenta';
    protected $primarykey='id';
}
