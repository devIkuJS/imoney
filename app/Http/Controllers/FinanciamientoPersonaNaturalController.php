<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\FinanciamientoPersonaNatural;
use App\Models\User;

class FinanciamientoPersonaNaturalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $financiamientoPersonaNatural = FinanciamientoPersonaNatural::all();
        return view('financiamientoPersonaNatural');
        
    }
    public function create(Request $request){

        $newfinanciamientoPersonaNatural = new FinanciamientoPersonaNatural();

        $this->validate($request, [
            'descripcion' => 'required',
            'establecimiento' => 'required',
            'servicio' => 'required',
            'monto_total' => 'required',
            'numero_cuota' => 'required',
            'foto_perfil' => 'required',
            'terminos' => 'accepted'
        ],
        [
            'descripcion.required' => 'Ingrese descripción',
            'establecimiento.required' => 'Ingrese establecimiento',
            'servicio.required' => 'Ingrese servicio',
            'monto_total.required' => 'Ingrese monto total',
            'numero_cuota.required' => 'Ingrese numero de cuota',
            'foto_perfil.required' => 'Ingrese su foto de perfil',
            'terminos.required' => 'Seleccione términos y condiciones'
        ]);
        
        $newfinanciamientoPersonaNatural->user_id = Auth::id();
        $newfinanciamientoPersonaNatural->descripcion = $request->descripcion; 
        $newfinanciamientoPersonaNatural->establecimiento = $request->establecimiento; 
        $newfinanciamientoPersonaNatural->servicio = $request->servicio;
        $newfinanciamientoPersonaNatural->monto_total = $request->monto_total;
        $newfinanciamientoPersonaNatural->numero_cuota = $request->numero_cuota;

        if($request->hasfile('foto_perfil')){
            $file=$request->file('foto_perfil');
            $destinationPath= 'images/financiamiento_perNatural/foto_perfil/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('foto_perfil')->move($destinationPath,$filename);
            $newfinanciamientoPersonaNatural->foto_perfil=$destinationPath . $filename;
        }
        $newfinanciamientoPersonaNatural->save();

        if($newfinanciamientoPersonaNatural!=null){
            MailController::enviarFinanciamiento(Auth::user()->name, 
                                             Auth::user()->email );

            MailController::notificarFinanciamiento(Auth::user()->name,
                                                Auth::user()->apellidos,
                                                Auth::user()->email);
            return redirect('/email-financiamiento-verify');
        }                                
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
