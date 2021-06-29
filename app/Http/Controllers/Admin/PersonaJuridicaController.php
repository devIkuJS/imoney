<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class PersonaJuridicaController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request){

        $personaJuridica = User::all();
          /*
   ->join('representante_legals','users.empresa_id','=','empresa_id')
  ->join('representante_legals','users.archivo_vigencia_id','=','archivo_vigencia_id')
  ->join('empresa','users.razon_social_id','=','razon_social_id')
  ->select('representante_legals.empresa_id AS empresa','representante_legals.archivo_vigencia AS vigencia')
  ->select('empresa.razon_social AS razon') */
        return view ('admin.personaJuridica.index',['personaJuridica'=>$personaJuridica]);
    }
}
