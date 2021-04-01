<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {   

		$usuarios = DB::table('users')
            ->join('roles', 'users.tipo_id', '=', 'roles.id')
            ->select('users.*', 'roles.name AS rol')
            ->get();

				
    	return view('admin.usuarios.index' , ['usuarios' => $usuarios]);
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
