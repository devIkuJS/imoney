<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CuentaBancaria;

class CuentaBancariaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cuentaBancaria = CuentaBancaria::all();
        /*return view('cuentaBancaria'); */

        return view('cuentaBancaria' , ['cuentaBancaria' => $cuentaBancaria]);
        
    }
    public function registro(Request $request)
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
