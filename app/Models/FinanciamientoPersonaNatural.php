<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanciamientoPersonaNatural extends Model
{
    use HasFactory;

    protected $table= 'financiamiento_persona_naturals';
    protected $primarykey='id';

       protected $fillable = [
        'user_id',   
        'descripcion',
        'establecimiento',
        'servicio',
        'numero_cuota',
        'foto_perfil',
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
