<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmpresaInversiones;
use App\Models\TipoCuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
class InversionController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $inversiones = EmpresaInversiones::all();
        $moneda_inversion = TipoCuenta::all();
        return view('admin.inversiones.index',['inversiones'=>$inversiones,'moneda_inversion' => $moneda_inversion]);     
    }

    public function registro(Request $request){
        $newInversion = new EmpresaInversiones();

         if($request->hasfile('informe')){
            $file=$request->file('informe');
            $destinationPath= 'images/informe/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('informe')->move($destinationPath,$filename);
            $newInversion->informe=$destinationPath . $filename;
        }

        if($request->hasfile('logo')){
            $file=$request->file('logo');
            $destinationPath= 'images/inversiones_logo/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('logo')->move($destinationPath,$filename);
            $newInversion->logo=$destinationPath . $filename;
        }
       
        $newInversion->nombre = $request->nombre;
        $newInversion->monto_disponible = $request->monto_disponible;
        $newInversion->monto_total = $request->monto_total;
        $newInversion->fecha_esperada = $request->fecha_esperada;
        $newInversion->moneda_inversion = $request->moneda_inversion;
        $newInversion->save();
        return redirect()->back();
    }

    public function actualizar(Request $request, $InversionId){
        $Inversion = EmpresaInversiones::find($InversionId);
        if($request->hasfile('informe')){
            $file=$request->file('informe');
            $destinationPath= 'images/informe/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('informe')->move($destinationPath,$filename);
            $Inversion->informe=$destinationPath . $filename;
        }

        if($request->hasfile('logo')){
            $file=$request->file('logo');
            $destinationPath= 'images/inversiones_logo/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('logo')->move($destinationPath,$filename);
            $Inversion->logo=$destinationPath . $filename;
        }
        
        $Inversion->nombre = $request->nombre;
        $Inversion->monto_total = $request->monto_total;
        $Inversion->fecha_esperada = $request->fecha_esperada;
        $Inversion->save();

        return redirect()->back();
    }

    public function eliminar(Request $request, $InversionId){
        $Inversion = EmpresaInversiones::find($InversionId);
        $Inversion->delete();

        return redirect()->back();
    }

}
