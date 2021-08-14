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

    public function obtenerSolesDolaeres(Request $request, $tipoOpcion)
    {
        
        $empresas = DB::select('select * from empresa_inversiones where moneda_inversion = ?', [$tipoOpcion]);
        /*$empresas = DB::select('empresa_inversiones')
                          ->where('moneda_inversion', '=', $tipoOpcion)
                          ->get();  */
        //return $empresas;
        /*$empresas = array_map(function ($value) {
            return (array)$value;
        }, $empresas);*/
        
        
        for ($i = 0; $i < count($empresas); $i++) {
           /* echo '<pre>';
print_r($empresas[$i]->fecha_esperada);
echo '</pre>';
exit;*/
           //$empresas[$i]["cantidad_dias"] = $this->dateDiff($empresas[$i]->fecha_esperada, now());
           $empresas[$i]->cantidad_dias = $this->dateDiff($empresas[$i]->fecha_esperada, now());
        }

        return ['empresas' => $empresas];     
        //exit;
    }

    function dateDiff ($d1, $d2) {
        // Return the number of days between the two dates:    
        return round(abs(strtotime($d1) - strtotime($d2))/86400);
    }

    public function gestion (Request $request)
      {
       
    	$data = $request->all();

        
        //$moneda = $request->moneda === '1' ? "Soles" : "Dolares";
        $cantidad_dias = $data["cantidad_dias"];

        $operator_monto_esperado =  $data["monto_cambio"]*(pow(1.08, ($cantidad_dias/360)));

        $monto_esperado = number_format($operator_monto_esperado, 2, '.', '');

        return redirect()->route('inversionistaOperacion', [
        'id' => $data["inversion_id"],
        'monto' => $data["monto_cambio"],
        'moneda' => $data["moneda"],
        'cantidad_dias' => $cantidad_dias,
        'monto_esperado' => $monto_esperado,
        ]);
        
      
         
    }
    public function razonSocial()
    {
        //SELECT e.razon_social FROM persona_operaciones po INNER JOIN empresa e ON e.id = po.empresa_id WHERE po.user_id = 69
        $idrol = DB::table('roles')
            ->select('roles.id', 'roles.name')
            ->where('roles.id', Auth::user()->tipo_id)
            ->get();
        
        if($idrol[0]->id == 3 || $idrol[0]->id == 4){
             $cuentaSelected = DB::table('persona_operaciones')
            ->join('empresa', 'empresa.id', '=', 'persona_operaciones.empresa_id')
            ->select('empresa.razon_social')
            ->where('persona_operaciones.user_id', Auth::id())
            ->get();
            
    	    return $cuentaSelected[0]->razon_social;
    	    
        }else if ($idrol[0]->id == 2){
            return Auth::user()->name;   
        }
        
       
    	
    	//return response("HOLA");
    } 

}
