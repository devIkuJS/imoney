<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusFinanciamiento extends Model
{
    use HasFactory;
    protected $table= 'status_nro_financiamiento';
    protected $primarykey='id';
}
