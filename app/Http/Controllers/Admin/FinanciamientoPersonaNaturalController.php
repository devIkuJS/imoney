<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinanciamientoPersonaNatural;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FinanciamientoPersonaNaturalController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {   
    
    $financiamientoPersonaNatural = DB::table('financiamiento_persona_naturals')
                                  ->join('users', 'financiamiento_persona_naturals.user_id', '=', 'users.id')
                                  ->select('users.*', 'users.name as user_name', 'financiamiento_persona_naturals.descripcion AS descripcion','financiamiento_persona_naturals.establecimiento AS establecimiento', 'financiamiento_persona_naturals.servicio AS servicio','financiamiento_persona_naturals.numero_cuota AS numero_cuota','financiamiento_persona_naturals.foto_perfil AS foto_perfil')
                                  ->get();
    //dd($request->all());
    	return view('admin.financiamientoPersonaNatural.index' , ['financiamientoPersonaNatural' => $financiamientoPersonaNatural]);
    }

}
