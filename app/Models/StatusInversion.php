<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusInversion extends Model
{
    use HasFactory;
    protected $table= 'status_nro_inversion';
    protected $primarykey='id';
}
