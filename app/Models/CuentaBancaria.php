<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function banco(){
        return $this->belongsTo('App\Models\Banco');
    }

    /*public function tipo_cuenta(){
        return $this->belongsTo('App\Models\TipoCuenta');
    }
    */
}
