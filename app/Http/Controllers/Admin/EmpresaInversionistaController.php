<?php

namespace App\Http\Controllers\Admin;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmpresaInversionista;
use App\Models\TipoCuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmpresaInversionistaController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $empresasInversionistas = EmpresaInversionista::all();
        return view('admin.empresasInversionistas.index',['empresasInversionistas' => $empresasInversionistas]);     
    }

    public function registro(Request $request){
        $newEmpresaInversionista = new EmpresaInversionista();


        $newEmpresaInversionista->nombre = $request->nombre;
        $newEmpresaInversionista->save();
        return redirect()->back();
    }
}
