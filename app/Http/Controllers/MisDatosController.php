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
        $user->celular = $request->filled('celular') ? $request->celular : $user->celular; 
        $user->domicilio = $request->filled('domicilio') ? $request->domicilio : $user->domicilio;
        
    	$user->save();   
    	//return redirect()->back();
        //dd($request->all());
        return response(json_encode($user),200)->header('Content-type','application/json');
       // return view('misDatos.actualizar',['user'=>$user]);
    }
    
    public function cambiarContrasena(Request $request)
    {
        try {
            $valid = validator($request->only('old_password', 'new_password', 'confirm_password'), [
                'old_password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6|different:old_password',
                'confirm_password' => 'required_with:new_password|same:new_password|string|min:6',
                    ], [
                'confirm_password.required_with' => 'Confirm password is required.'
            ]);

            if ($valid->fails()) {
                return response()->json([
                            'errors' => $valid->errors(),
                            'message' => 'Faild to update password.',
                            'status' => false
                                ], 200);
            }
//            Hash::check("param1", "param2")
//            param1 - user password that has been entered on the form
//            param2 - old password hash stored in database
            if (Hash::check($request->get('old_password'), Auth::user()->password)) {
                $user = User::find(Auth::user()->id);
                $user->password = (new BcryptHasher)->make($request->get('new_password'));
                if ($user->save()) {
                    return response()->json([
                                'data' => [],
                                'message' => 'Your password has been updated',
                                'status' => true
                                    ], 200);
                }
            } else {
                return response()->json([
                            'errors' => [],
                            'message' => 'Wrong password entered.',
                            'status' => false
                                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                        'errors' => $e->getMessage(),
                        'message' => 'Please try again',
                        'status' => false
                            ], 200);
        }
    
        return redirect()->back();
       
    }
}
