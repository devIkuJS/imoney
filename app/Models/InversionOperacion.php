<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InversionOperacion extends Model
{
    use HasFactory;
    protected $table= 'inversion_operacion';
    protected $primarykey='id';
}