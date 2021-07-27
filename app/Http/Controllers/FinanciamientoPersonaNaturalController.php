<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\FinanciamientoPersonaNatural;
use App\Models\User;
use Illuminate\Support\Facades\Session;

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
        $newfinanciamientoPersonaNatural->user_id = Auth::id();
        $newfinanciamientoPersonaNatural->descripcion = $request->descripcion; 
        $newfinanciamientoPersonaNatural->establecimiento = $request->establecimiento; 
        $newfinanciamientoPersonaNatural->servicio = $request->servicio;
        $newfinanciamientoPersonaNatural->numero_cuota = $request->numero_cuota;

        if($request->hasfile('foto_perfil')){
            $file=$request->file('foto_perfil');
            $destinationPath= 'images/financiamiento_perNatural/foto_perfil/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('foto_perfil')->move($destinationPath,$filename);
            $newfinanciamientoPersonaNatural->foto_perfil=$destinationPath . $filename;
        }
        $newfinanciamientoPersonaNatural->save();

        
        MailController::enviarFinanciamiento(Auth::user()->name, 
        Auth::user()->email );
        return redirect('/email-financiamiento-verify');
                                    
    }
    
}
