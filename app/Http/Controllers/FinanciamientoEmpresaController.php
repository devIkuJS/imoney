<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\FinanciamientoEmpresa;

class FinanciamientoEmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $financiamientoEmpresa = FinanciamientoEmpresa::all();
        return view('financiamientoEmpresa');
        
    }

    public function create(Request $request){
    
        $newFinanciamientoEmpresa = new FinanciamientoEmpresa();
        $newFinanciamientoEmpresa->user_id = Auth::id();

        if($request->hasfile('factura')){
            $file=$request->file('factura');
            $destinationPath= 'images/finaciamientoEmpresa/factura/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('factura')->move($destinationPath,$filename);
            $newFinanciamientoEmpresa->factura=$destinationPath . $filename;
        }

        if($request->hasfile('copia_literal')){
            $file=$request->file('copia_literal');
            $destinationPath= 'images/finaciamientoEmpresa/copia_literal/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('copia_literal')->move($destinationPath,$filename);
            $newFinanciamientoEmpresa->copia_literal=$destinationPath . $filename;
        }

        if($request->hasfile('cotizacion')){
            $file=$request->file('cotizacion');
            $destinationPath= 'images/finaciamientoEmpresa/cotizacion/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('cotizacion')->move($destinationPath,$filename);
            $newFinanciamientoEmpresa->cotizacion=$destinationPath . $filename;
        }

        if($request->hasfile('ficha_cliente')){
            $file=$request->file('ficha_cliente');
            $destinationPath= 'images/finaciamientoEmpresa/ficha_cliente/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('ficha_cliente')->move($destinationPath,$filename);
            $newFinanciamientoEmpresa->ficha_cliente=$destinationPath . $filename;
        }

        if($request->hasfile('ficha_inmobiliario')){
            $file=$request->file('ficha_inmobiliario');
            $destinationPath= 'images/finaciamientoEmpresa/ficha_inmobiliario/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('ficha_inmobiliario')->move($destinationPath,$filename);
            $newFinanciamientoEmpresa->ficha_inmobiliario=$destinationPath . $filename;
        }
        $newFinanciamientoEmpresa->save();
        if($newFinanciamientoEmpresa!=null){
            MailController::enviarFinanciamientoEmpresa(Auth::user()->name, 
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

