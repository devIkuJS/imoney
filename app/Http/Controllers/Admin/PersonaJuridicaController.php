<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use App\Models\RepresentanteLegal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PersonaJuridicaController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request){

        $representanteLegal = RepresentanteLegal::all();
        $empresa = Empresa::all();
        $personaJuridica = DB::table('users')
     
            ->join('roles', 'users.tipo_id', '=', 'roles.id')
            ->select('users.*', 'roles.name AS rol')
            ->whereIn('roles.id',[3,4])
            ->get();

       /* ->join('users', 'representante_legals.user_id', '=', 'users.id')
        ->join('empresa', 'representante_legals.empresa_id', '=', 'empresa.id')
        ->select('representante_legals.empresa_id AS empresaId','empresa.razon_social AS razon','representante_legals.archivo_vigencia')
        ->where('representante_legals.user_id', Auth::id())*/
          /*
          
   ->join('representante_legals','users.empresa_id','=','empresa.id')
  ->join('representante_legals','users.archivo_vigencia_id','=','archivo_vigencia.id')
  ->join('empresa','users.razon_social_id','=','razon_social_id')
  ->select('representante_legals.empresa_id AS empresa','representante_legals.archivo_vigencia AS vigencia')
  ->select('empresa.razon_social AS razon') 
  ->where('roles.id','1')
  ->whereIn('roles.id',['3','4'])
  */
  
        return view ('admin.personaJuridica.index',['representanteLegal '=>$representanteLegal ,'personaJuridica'=>$personaJuridica,'empresa'=>$empresa]);
    }
}
