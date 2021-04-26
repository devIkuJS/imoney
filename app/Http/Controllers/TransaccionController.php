<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;
use App\Models\StatusOperacion;

class TransaccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $nroTransaccion) {  

        $transaccion = DB::table('operacion')
            ->join('bancos', 'operacion.banco_origen_id', '=', 'bancos.id')
            ->select('operacion.*', 'bancos.name AS banco')
            ->where('operacion.nro_orden', $nroTransaccion)
            ->where('operacion.user_id', Auth::id())
            ->get();

        return view('transaccion' , [
            'transaccion' => $transaccion[0],

        ]);
    }

    public function enviarOperacion(Request $request){


        $newOperacion = new StatusOperacion(); 

        if($request->hasfile('voucher')){
            $file=$request->file('voucher');
            $destinationPath= 'images/voucher/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('voucher')->move($destinationPath,$filename);
            $newOperacion->voucher_operacion=$destinationPath . $filename;
        }
        
        $newOperacion->operacion_id = $request->transaccion_id;
        $newOperacion->nro_operacion = $request->nro_operacion;

        DB::table('operacion')->where('id', $request->transaccion_id)->update(array(
            'estado_id'=>2,
            'updated_at'=> now()
        ));
        $newOperacion->save();

        return redirect()->back();

    }
}
