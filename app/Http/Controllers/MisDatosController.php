<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\MisDatos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MisDatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       /* $misDatos = MisDatos::all();
        return view('misDatos'); */
        
        $user = User::find(Auth::user()->id); 
        
        return view('misDatos',['user'=>$user]);
        
    }

    public function actualizar(Request $request, $usuarioId)
    {
    	$user = User::find($usuarioId);
        /*$user->domicilio = $request->domicilio;*/ 
        $user->celular = $request->filled('celular') ? $request->celular : $user->celular; 
        $user->domicilio = $request->filled('domicilio') ? $request->domicilio : $user->domicilio;
      
    	$user->save();   
    	return redirect()->back();
    	//dd($request->all());
        return view('misDatos.actualizar',['user'=>$user]);
    }
    
}
