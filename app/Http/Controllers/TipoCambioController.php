<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TipoCambio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Services\FirebaseService;


class TipoCambioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {  

      $firebaseService= FirebaseService::All();
      $tipoCambio = DB::table('tipo_cambios')
            ->select('id','compra', 'venta' , 'updated_at')
            ->get();

              
      return view('tipoCambio')->with('tipoCambio', $tipoCambio);
    }

    public function getTipoCambioTimeReal(){

      $tipoCambio = DB::table('tipo_cambios')
            ->select('compra', 'venta' , 'updated_at')
            ->get();
            return response(json_encode($tipoCambio),200)->header('Content-type','application/json');

    }
  
    public function sendTipoCambio (Request $request)
      {
        $data = $request->all();

        Session::put('dataTipoCambio', json_encode($data));

        return response(json_encode($data),200)->header('Content-type','application/json');
         
      } 

}
