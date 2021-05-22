<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaInversiones extends Model
{
    use HasFactory;

    protected $table= 'empresa_inversiones';
    protected $primarykey='id';

    protected $fillable = [
        'nombre',
        'informe'
    ];
}
