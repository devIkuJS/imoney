<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CuentaBancaria;
use App\Models\CategoriaCuenta;
use App\Models\User;
use App\Models\Banco;
use App\Models\MisDatos;
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
        $lista_cuentas = DB::table('cuenta_bancarias')
            
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->join('categoria_cuenta', 'cuenta_bancarias.categoria_cuenta_id', '=', 'categoria_cuenta.id')
            ->select('cuenta_bancarias.id', 'bancos.name AS banco', 'cuenta_bancarias.numero_cuenta', 'categoria_cuenta.name AS tipo_cuenta')
            ->where('cuenta_bancarias.user_id', Auth::id())
            ->get();

    	return view('cuentaBancaria' , ['lista_cuentas' => $lista_cuentas]);
    }
    public function registro(Request $request)
    {
        $newCuentaBancaria = new CuentaBancaria();

        $tipo_cuenta = $request->tipo_cuenta === 'Soles' ? "1" : "2";
        $newCuentaBancaria->user_id = Auth::id();
    	$newCuentaBancaria->banco_id = $request->cuenta_bancaria_user;
        $newCuentaBancaria->tipo_cuenta = $tipo_cuenta;
        $newCuentaBancaria->numero_cuenta = $request->numero_cuenta;
        $newCuentaBancaria->categoria_cuenta_id = $request->categoria_cuenta;
        $newCuentaBancaria->save();
        
        return redirect()->back();
       
    
    }
    /*public function getCuentaBancariaSelected(){
        $cuentaBancaria = cuentaBancaria::select(['id','usuario','banco','Tipo de cuenta','Categoria de cuenta','Número de cuenta']);
 
        return Datatables::of($cuentaBancaria)
 
            ->make(true);
    }*/

    public function getCuentaBancariaSelected(Request $request,$cuentaId,$userId){
        $cuentaSelected = DB::table('cuenta_bancarias')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->join('categoria_cuenta', 'cuenta_bancarias.categoria_cuenta_id', '=', 'categoria_cuenta.id')
            ->select('cuenta_bancarias.id', 'bancos.name AS banco', 'cuenta_bancarias.numero_cuenta', 'categoria_cuenta.name AS tipo_cuenta')
            ->where('cuenta_bancarias.id', $cuentaId)
            ->where('cuenta_bancarias.user_id', Auth::id())
            ->get();
    	return response(json_encode($cuentaSelected),200)->header('Content-type','application/json');
      }
}
