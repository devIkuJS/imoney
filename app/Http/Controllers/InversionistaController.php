<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inversionista;
use App\Models\EmpresaInversiones;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DateTime;


class InversionistaController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empresas = EmpresaInversiones::all();

        for ($i = 0; $i < count($empresas); $i++) {
           $empresas[$i]["cantidad_dias"] = $this->dateDiff($empresas[$i]["fecha_esperada"], now());
        }

        return view('inversionista', ['empresas' => $empresas]);     
    }

    function dateDiff ($d1, $d2) {
        // Return the number of days between the two dates:    
        return round(abs(strtotime($d1) - strtotime($d2))/86400);
    }

    public function gestion (Request $request)
      {

    	$data = $request->all();

        $cantidad_dias = $data["cantidad_dias"];

        $operator_monto_esperado =  $data["monto_cambio"]*(pow(1.08, ($cantidad_dias/360)));

        $monto_esperado = number_format($operator_monto_esperado, 2, '.', '');

        return redirect()->route('inversionistaOperacion', [
        'id' => $data["inversion_id"],
        'monto' => $data["monto_cambio"],
        'moneda' => 1,
        'cantidad_dias' => $cantidad_dias,
        'monto_esperado' => $monto_esperado,
        ]);
        
      
         
      } 

}
