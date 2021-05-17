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
   /* $usuarios = DB::table('cuenta_bancarias')
            ->join('users', 'cuenta_bancarias.user_id', '=', 'users.id')
            ->join('bancos', 'cuenta_bancarias.banco_id', '=', 'bancos.id')
            ->join('tipo_cuentas', 'cuenta_bancarias.tipo_cuenta', '=', 'tipo_cuentas.id')
            ->join('categoria_cuenta', 'cuenta_bancarias.categoria_cuenta_id', '=', 'categoria_cuenta.id')
            ->select('users.*', 'cuenta_bancarias.numero_cuenta AS cuenta_bancaria','bancos.name AS nombre_banco', 'tipo_cuentas.name AS moneda', 'categoria_cuenta.name AS tipo_cuenta')
            ->get();
            */

				
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
