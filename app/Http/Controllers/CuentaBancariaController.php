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
    public function create(Request $request)
    {
        $newCuentaBancaria = new CuentaBancaria();

        $newCuentaBancaria->user_id = Auth::id();
    	$newCuentaBancaria->banco_id = $request->bancos;
        $newCuentaBancaria->tipo_cuenta_id = $request->tipo_cuentas;
        $newCuentaBancaria->cuenta_soles = $request->cuenta_soles;
        $newCuentaBancaria->cuenta_dolares = $request->cuenta_dolares;
       
    	$newCuentaBancaria->save();

    	return redirect()->back();
    }
}
