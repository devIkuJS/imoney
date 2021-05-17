<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CuentaBancaria;
use Illuminate\Support\Facades\DB;

class CuentaBancariaController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {   
   
    $cBancaria = DB::table('cuenta_bancarias')
            ->join('users', 'cuenta_bancarias.user_id', '=', 'users.id')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->join('tipo_cuentas', 'cuenta_bancarias.tipo_cuenta', '=', 'tipo_cuentas.id')
            ->join('categoria_cuenta', 'cuenta_bancarias.categoria_cuenta_id', '=', 'categoria_cuenta.id')
            ->select('users.id as user_id', 'users.name as user_name', 'users.apellidos as user_apellido', 'users.dni as user_dni', 'users.archivo_dni_front as imagen_dni', 'cuenta_bancarias.numero_cuenta AS cuenta_bancaria','bancos.name AS nombre_banco', 'tipo_cuentas.name AS moneda', 'categoria_cuenta.name AS tipo_cuenta')
            ->get();
            

				
    	return view('admin.cuentabancaria.index' , ['cBancaria' => $cBancaria]);
    }

}
