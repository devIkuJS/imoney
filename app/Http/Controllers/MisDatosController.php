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
        $user->domicilio = $request->filled('domicilio') ? $request->domicilio : $user->domicilio;
        $user->celular = $request->filled('celular') ? $request->celular : $user->celular; 
        $user->ocupacion = $request->filled('ocupacion') ? $request->ocupacion : $user->ocupacion;
        /*$user->domicilio = $request->domicilio;
        $user->celular = $request->celular;
        $user->ocupacion = $request->ocupacion;*/
    	$user->save();   
    	return redirect()->back();
    	//dd($request->all());
        return response(json_encode($user),200)->header('Content-type','application/json');
        //return view('misDatos.actualizar',['user'=>$user]);
    }
    
    public function cambiarContrasena(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('misDatos.cambiarContrasena')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('misDatos')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('misDatos.cambiarContrasena')->with('message', 'Credenciales incorrectas');
            }
        }
    }
}
