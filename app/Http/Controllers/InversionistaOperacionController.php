<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\InversionOperacion;
use App\Models\Banco;
use App\Models\CuentaBancaria;
use App\Models\CategoriaCuenta;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class InversionistaOperacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        
        $bancos = Banco::all();
        $categoria_cuenta = categoriaCuenta::all();
        $monto_inversion = $request->monto;
        $tipo_cuenta = $request->moneda;

        $moneda = $request->moneda === '1' ? "Soles" : "Dolares";
        

        $lista_cuenta_bancaria = DB::table('cuenta_bancarias')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->join('categoria_cuenta', 'cuenta_bancarias.categoria_cuenta_id', '=', 'categoria_cuenta.id')
            ->select('cuenta_bancarias.*', 'bancos.name AS banco', 'categoria_cuenta.name AS tipo_cuenta')
            ->where('cuenta_bancarias.tipo_cuenta', $tipo_cuenta)
            ->where('cuenta_bancarias.user_id', Auth::id())
            ->where('cuenta_bancarias.estado', 1)
            ->get();

        return view('inversionistaOperacion',[
            'bancos'=>$bancos,
            'lista_cuenta_bancaria' => $lista_cuenta_bancaria,
            'categoria_cuenta'=>$categoria_cuenta,
            'monto_inversion'=>$monto_inversion,
            'moneda'=>$moneda,
            'tipo_cuenta'=>$tipo_cuenta,
            ]);
    }

    public function createCuentaBancaria(Request $request){

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
        
        return response(json_encode($newCuentaBancaria),200)->header('Content-type','application/json');

        
          
      }

      public function getCuentaBancariaSelected(Request $request, $cuentaId){
        $cuentaSelected = DB::table('cuenta_bancarias')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->join('categoria_cuenta', 'cuenta_bancarias.categoria_cuenta_id', '=', 'categoria_cuenta.id')
            ->select('cuenta_bancarias.id', 'bancos.name AS banco', 'cuenta_bancarias.numero_cuenta', 'categoria_cuenta.name AS tipo_cuenta')
            ->where('cuenta_bancarias.id', $cuentaId)
            ->where('cuenta_bancarias.user_id', Auth::id())
            ->where('cuenta_bancarias.estado', 1)
            ->get();
    	return response(json_encode($cuentaSelected),200)->header('Content-type','application/json');
      }

      public function createOperacion (Request $request)
      {

        $newOperacion = new InversionOperacion();
        $tipo_cuenta = $request->tipo_cuenta;
        $newOperacion->user_id = Auth::id();
        $newOperacion->nro_orden = $this->generateRandomString();
        $newOperacion->banco_origen_id = $request->bancos;
        $newOperacion->monto_inversion = $request->monto_inversion;
        $newOperacion->moneda_id = $request->tipo_cuenta;
        $newOperacion->banco_destino_id = $request->cuenta_destino;
        $newOperacion->estado_id = "1";
        $newOperacion->save();
        return response(json_encode($newOperacion->nro_orden),200)->header('Content-type','application/json');
          
      } 


      function generateRandomString($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXY123456789Z';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
