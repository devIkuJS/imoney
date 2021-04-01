<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    
    protected $table= 'empresa';
    protected $primarykey='id';

       protected $fillable = [
        'razon_social',
        'numero_ruc',
        'actividad_economica',
        'grupo_economico',
        'telefono_fijo',
        'direccion_fiscal',
        'departamento',
        'provincia',
        'distrito'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


}

