<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoCuenta;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EstadoCuentaController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {   
		$estadoCuenta = EstadoCuenta::all();
    
   /* $estadoCuenta = DB::table('financiamiento_empresas')
                                  ->join('users', 'financiamiento_empresas.user_id', '=', 'users.id')
                                  ->select('users.*', 'users.name as user_name', 'financiamiento_empresas.descripcion AS descripcion','financiamiento_persona_naturals.establecimiento AS establecimiento', 'financiamiento_persona_naturals.servicio AS servicio','financiamiento_persona_naturals.numero_cuota AS numero_cuota','financiamiento_persona_naturals.foto_perfil AS foto_perfil')
                                  ->get();*/
    //dd($request->all());
    	return view('admin.estadoCuenta.index' , ['estadoCuenta' => $estadoCuenta]);
    }

    public function create(Request $request){
        $newEstadoCuenta= new EstadoCuenta();
        $newEstadoCuenta->numero_ruc = $request->numero_ruc; 

        if($request->hasfile('documento')){
            $file=$request->file('documento');
            $destinationPath= 'images/estadoCuentas/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('documento')->move($destinationPath,$filename);
            $newEstadoCuenta->documento=$destinationPath . $filename;
        }

        if($request->hasfile('original')){
            $file=$request->file('original');
            $destinationPath= 'images/estadoCuentas/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('original')->move($destinationPath,$filename);
            $newEstadoCuenta->original=$destinationPath . $filename;
        }
        $newEstadoCuenta->razon_social = $request->razon_social; 
        $newEstadoCuenta->save();
        return redirect()->back();
    }

}
