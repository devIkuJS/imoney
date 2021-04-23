<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EstadoCuenta;

class EstadoCuentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $estadoCuenta = EstadoCuenta::all();
        return view('estadoCuenta');
        
    }
}
