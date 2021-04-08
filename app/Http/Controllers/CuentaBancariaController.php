<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CuentaBancaria;

class CuentaBancariaController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $cuentaBancaria = CuentaBancaria::all();
        return view('cuentaBancaria');
        
    }
}
