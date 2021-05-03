<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
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
            ->select('operacion.*', 'bancos.name AS banco' , DB::raw("(SELECT `bancos`.`name`
            FROM `cuenta_bancarias`
            inner join `bancos` on `cuenta_bancarias`.`banco_id` = `bancos`.`id`
            where `cuenta_bancarias`.`id` = `operacion`.`banco_destino_id`) AS `banco_destino`")  )
            ->where('operacion.nro_orden', $nroTransaccion)
            ->where('operacion.user_id', Auth::id())
            ->get();

        return view('transaccion' , [
            'transaccion' => $transaccion[0],

        ]);
    }

    public function enviarOperacion(Request $request){


        $transaccion = json_decode($request->transaccion);

        $newOperacion = new StatusOperacion(); 

        if($request->hasfile('voucher')){
            $file=$request->file('voucher');
            $destinationPath= 'images/voucher/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('voucher')->move($destinationPath,$filename);
            $newOperacion->voucher_operacion=$destinationPath . $filename;
        }
        
        $newOperacion->operacion_id = $transaccion->id;
        $newOperacion->nro_operacion = $request->nro_operacion;

        DB::table('operacion')->where('id', $transaccion->id)->update(array(
            'estado_id'=>2,
            'updated_at'=> now()
        ));

        $newOperacion->save();

        MailController::enviarOperacion(Auth::user()->name, Auth::user()->email , $transaccion->nro_orden, $transaccion->montoA, $transaccion->descripcionMontoA,  $transaccion->montoB, $transaccion->descripcionMontoB, $transaccion->banco , $transaccion->banco_destino);

       return response(json_encode($transaccion->nro_orden),200)->header('Content-type','application/json');

        

    }
}
