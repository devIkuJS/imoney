<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaCuenta extends Model
{
    protected $table= 'categoria_cuenta';
    protected $primarykey='id';
    use HasFactory;
}
