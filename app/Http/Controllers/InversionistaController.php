<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inversionista;
use App\Models\EmpresaInversiones;
use Illuminate\Support\Facades\Session;
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
           /*$empresas[$i]["monto_total"] = 50000;*/
        }

        //$monto_total = $empresas[0]["monto_disponible"]*(((1+0.08)*($empresas[0]["cantidad_dias"]/360)));
        /*$monto_total = 162837.50*(((1+0.125)*(98/360)));
        dd($monto_total);
        */
        return view('inversionista', ['empresas' => $empresas]);     
    }

    function dateDiff ($d1, $d2) {
        // Return the number of days between the two dates:    
        return round(abs(strtotime($d1) - strtotime($d2))/86400);
    }

    public function gestion (Request $request)
      {

    	$data = $request->all();

        return redirect()->route('inversionistaOperacion', [
        'id' => $data["inversion_id"],
        'monto' => $data["monto_cambio"],
        'moneda' => 1,

        ]);
        
      
         
      } 

}
