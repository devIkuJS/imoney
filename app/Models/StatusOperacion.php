<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOperacion extends Model
{
    use HasFactory;
    protected $table= 'status_nro_operacion';
    protected $primarykey='id';
}
