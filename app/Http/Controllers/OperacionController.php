<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Operacion;
use App\Models\Banco;

class OperacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() { 
        $operacion = Operacion::all();       
        return view('operacion');
      }

    public function crear (Request $request){

      //  $operacion = new App\Banco;
      //  $operacion->nombre_banco = $request->nombre_banco;
      //  $operacion->numero_cuenta = $request->numero_cuenta;
      //  $operacion->save();
        
      //  return redirect()->back()->with('mensaje','registro exitoso');
      $bancos= Banco::all();
      return view('operacion.create', compact('bancos'));
    }  
}
