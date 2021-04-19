<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Operacion;
use App\Models\Banco;
use App\Models\CuentaBancaria;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OperacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) { 

        $bancos = Banco::all();

        $dataTipoCambio = json_decode(Session::get('dataTipoCambio'), true);

        $tipo_cuenta = $dataTipoCambio["descripcionMontoB"] === 'Soles' ? "1" : "2";

        $lista_cuenta_bancaria = DB::table('cuenta_bancarias')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->select('cuenta_bancarias.*', 'bancos.name AS banco')
            ->where('cuenta_bancarias.tipo_cuenta', $tipo_cuenta)
            ->where('cuenta_bancarias.user_id', Auth::id())
            ->get();

            
        return view('operacion' , [
            'bancos' => $bancos,
            'dataTipoCambio' => $dataTipoCambio,
            'lista_cuenta_bancaria' => $lista_cuenta_bancaria,

        ]); 
      }

      public function createCuentaBancaria(Request $request){

        $newCuentaBancaria = new CuentaBancaria();
        /*$this->validate($request, [
            'banco_envio' => 'required',
            'banco_destino' => 'required',
            'terminos' => 'accepted',
        ],
        [
            'banco_envio.required' => 'Seleccione el banco donde envias tu dinero',
            'banco_destino.required' => 'Seleccione la cuenta de destino',
            'terminos.required' => 'Seleccione terminos y condiciones',
        ]);
        */
        
        $tipo_cuenta = $request->tipo_cuenta === 'Soles' ? "1" : "2";
        $newCuentaBancaria->user_id = Auth::id();
    	$newCuentaBancaria->banco_id = $request->cuenta_bancaria_user;
        $newCuentaBancaria->tipo_cuenta = $tipo_cuenta;
        $newCuentaBancaria->numero_cuenta = $request->numero_cuenta;
        $newCuentaBancaria->save();
        return redirect()->back();
        
        //dd($newCuentaBancaria);
        
          
      } 


      public function getCuentaBancariaSelected(Request $request, $cuentaId){
        $cuentaSelected = DB::table('cuenta_bancarias')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->select('cuenta_bancarias.id', 'bancos.name AS banco', 'cuenta_bancarias.numero_cuenta')
            ->where('cuenta_bancarias.id', $cuentaId)
            ->where('cuenta_bancarias.user_id', Auth::id())
            ->get();
    	return response(json_encode($cuentaSelected),200)->header('Content-type','application/json');
      }



      public function createOperacion (Request $request)
      {
        $this->validate($request, [
            'banco_envio' => 'required',
            'banco_destino' => 'required',
            'terminos' => 'accepted',
        ],
        [
            'banco_envio.required' => 'Seleccione el banco donde envias tu dinero',
            'banco_destino.required' => 'Seleccione la cuenta de destino',
            'terminos.required' => 'Seleccione terminos y condiciones',
        ]);
        

        $todo = new Operacion();
        $tipo_cuenta = $request->tipo_cuenta === 'Soles' ? "1" : "2";
        $newOperacion->user_id = Auth::id();
        $newOperacion->banco_id = $request->bancos;
        $newOperacion->descripcionMontoA = $request->descripcionMontoA;
        $newOperacion->montoA = $request->montoA;
        $newOperacion->descripcionMontoB = $request->descripcionMontoB;
        $newOperacion->montoB = $request->montoB;
        $newOperacion->cuenta_id = $request->cuenta_destino;
        $newOperacion->tipo_cuenta = $tipo_cuenta;
        $newOperacion->save();
        return response(json_encode($newOperacion),200)->header('Content-type','application/json');;
          
      } 

      
}
