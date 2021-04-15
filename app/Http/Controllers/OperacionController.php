<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Operacion;

class OperacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() { 
        $operacion = Operacion::all();       
        return view('operacion');
      }
}
