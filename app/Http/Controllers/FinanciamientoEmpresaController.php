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

    public function enviarFinanciamiento(Request $request){

        $transaccion = json_decode($request->transaccion);
        
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
        return redirect()->back();

        MailController::enviarFinanciamiento(Auth::user()->name, 
                                Auth::user()->email , $transaccion->nro_orden); 
                                    
        MailController::notificarOperacion(Auth::user()->name, Auth::user()->apellidos, Auth::user()->email , $transaccion->nro_orden, "2");
        return response(json_encode($transaccion->nro_orden),200)->header('Content-type','application/json');
    }
    function generateRandomString($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXY123456789Z';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

