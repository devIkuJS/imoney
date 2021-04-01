<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaOperaciones extends Model
{
    use HasFactory;

    public function empresa(){
        return $this->belongsTo('App\Models\Empresa');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    
}
