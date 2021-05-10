<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\CuentaBancaria;
use App\Models\CategoriaCuenta;
use App\Models\User;
use App\Models\Banco;
use App\Models\MisDatos;
use App\Models\TipoCuenta;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CuentaBancariaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $bancos = Banco::all();
        $categoria_cuenta = CategoriaCuenta::all();
        $tipo_cuenta = TipoCuenta::all();
        $lista_cuentas = DB::table('cuenta_bancarias')
            ->join('users', 'cuenta_bancarias.user_id', '=', 'users.id')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->join('tipo_cuentas', 'cuenta_bancarias.tipo_cuenta', '=', 'tipo_cuentas.id')
            ->join('categoria_cuenta', 'cuenta_bancarias.categoria_cuenta_id', '=', 'categoria_cuenta.id')
            ->select('cuenta_bancarias.id','bancos.name AS banco', 'tipo_cuentas.name AS tipo','categoria_cuenta.name AS categoria','cuenta_bancarias.numero_cuenta', 'cuenta_bancarias.estado')
            ->where('cuenta_bancarias.user_id', Auth::id())
            ->get();

    	return view('cuentaBancaria' , ['lista_cuentas' => $lista_cuentas,'bancos' => $bancos,'categoria_cuenta' => $categoria_cuenta,'tipo_cuenta' => $tipo_cuenta]);
        
    }
    public function registro(Request $request){
        $this->validate($request, [
            'cuenta_bancaria_user' => 'required',
            'numero_cuenta' => 'required|min:5|unique:cuenta_bancarias,numero_cuenta',
            'categoria_cuenta' => 'required',
        ],
        [
            'cuenta_bancaria_user.required' => 'Seleccione el banco de su cuenta bancaria',
            'numero_cuenta.required' => 'El numero de cuenta bancaria es inválido',
            'categoria_cuenta.required' => 'Seleccione el tipo de su cuenta corriente (Ahorros o Corriente)',
            'numero_cuenta.unique' => 'La cuenta ingresada ya esta registrada en el sistema',
        ]);
        $newCuentaBancaria = new CuentaBancaria();
        $newCuentaBancaria->user_id = Auth::id();
    	$newCuentaBancaria->banco_id = $request->cuenta_bancaria_user;
        $newCuentaBancaria->tipo_cuenta = $request->tipo_cuenta;
        $newCuentaBancaria->numero_cuenta = $request->numero_cuenta;
        $newCuentaBancaria->categoria_cuenta_id = $request->categoria_cuenta;
        $newCuentaBancaria->estado = 1;
        $newCuentaBancaria->save();
        
        return redirect()->back();
       
    
    }

      public function actualizar(Request $request, $cuentaBancariaId)
      {
          $cuentaBancaria = CuentaBancaria::find($cuentaBancariaId);
          $cuentaBancaria->numero_cuenta = $request->numero_cuenta;
          $cuentaBancaria->save();
  
          return redirect()->back();
      }

      public function cambiarEstado(Request $request, $cuentaBancariaId){
        $cuentaBancaria = CuentaBancaria::find($cuentaBancariaId);
          $cuentaBancaria->estado = 0;
          $cuentaBancaria->save();

        return redirect()->back();
      }
}
