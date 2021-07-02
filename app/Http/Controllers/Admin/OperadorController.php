<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OperadorController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {   
   
    $usuarios = DB::table('persona_operaciones')
            ->join('users', 'persona_operaciones.user_id', '=', 'users.id')
            ->join('empresa', 'persona_operaciones.empresa_id', '=', 'empresa.id')
            ->select('users.*','empresa.razon_social AS razon_social')
            ->get();
            
				
    	return view('admin.operador.index' , ['usuarios' => $usuarios]);
    }

    public function registro(Request $request)
    {
    	$newUsuario = new User();
    	$newUsuario->name = $request->name;
    	$newUsuario->save();

    	return redirect()->back();
    	//dd($request->all());
    }

    public function actualizar(Request $request, $usuarioId)
    {
    	$usuario = User::find($usuarioId);
    	$usuario->name = $request->name;
    	$usuario->save();

    	return redirect()->back();
    	//dd($request->all());
    }

    public function eliminar(Request $request, $usuarioId)
    {
    	$usuario = User::find($usuarioId);
    	$usuario->delete();

    	return redirect()->back();
    	//dd($request->all());
    }
}
