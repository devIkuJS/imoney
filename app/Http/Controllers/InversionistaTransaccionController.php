<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\StatusInversion;
use App\Models\Inversionista;

class InversionistaTransaccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $nroTransaccion) {  

        $transaccion = DB::table('inversion_operacion')
            ->join('bancos', 'inversion_operacion.banco_origen_id', '=', 'bancos.id')
            ->join('tipo_cuentas', 'inversion_operacion.moneda_id', '=', 'tipo_cuentas.id')
            ->join('empresa_inversiones', 'inversion_operacion.empresa_id', '=', 'empresa_inversiones.id')
            ->select('inversion_operacion.*', 'bancos.name AS banco' , 'tipo_cuentas.name as moneda', 'empresa_inversiones.nombre AS empresa_nombre', 'empresa_inversiones.serie_num_comprobante AS codigo_factura', DB::raw("(SELECT `bancos`.`name`
            FROM `cuenta_bancarias`
            inner join `bancos` on `cuenta_bancarias`.`banco_id` = `bancos`.`id`
            where `cuenta_bancarias`.`id` = `inversion_operacion`.`banco_destino_id`) AS `banco_destino`")  )
            ->where('inversion_operacion.nro_orden', $nroTransaccion)
            ->where('inversion_operacion.user_id', Auth::id())
            ->get();

        return view('inversionistaTransaccion' , [
            'transaccion' => $transaccion[0],

        ]);
        
    }

    public function enviarOperacion(Request $request){

        $transaccion = json_decode($request->transaccion);


        $newOperacion = new StatusInversion(); 

        if($request->hasfile('voucher')){
            $file=$request->file('voucher');
            $destinationPath= 'images/voucher/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('voucher')->move($destinationPath,$filename);
            $newOperacion->voucher_operacion=$destinationPath . $filename;
        }
        
        $newOperacion->operacion_id = $transaccion->id;
        $newOperacion->nro_operacion = $request->nro_operacion;


        DB::table('inversion_operacion')->where('id', $transaccion->id)->update(array(
            'estado_id'=>2,
            'updated_at'=> now()
        ));

        $empresa_inversion = DB::table('empresa_inversiones')
            ->select('monto_disponible', 'fecha_esperada')
            ->where('id', $transaccion->empresa_id)
            ->get();


       $monto_disponible_final = $empresa_inversion[0]->monto_disponible - $transaccion->monto_inversion;

        DB::table('empresa_inversiones')->where('id', $transaccion->empresa_id)->update(array(
            'monto_disponible'=>$monto_disponible_final,
            'updated_at'=> now()
        ));

        $fecha_esperada = date('d-m-Y', strtotime($empresa_inversion[0]->fecha_esperada));
        
        
        $newOperacion->save();

       MailController::enviarNroInversion(Auth::user()->name, Auth::user()->email , $transaccion->nro_orden, $transaccion->monto_inversion,$transaccion->cantidad_dias, $transaccion->monto_esperado,$fecha_esperada, $transaccion->moneda, $transaccion->banco , $transaccion->banco_destino,  $transaccion->empresa_nombre, $transaccion->codigo_factura);
       MailController::notificarOperacionInversion(Auth::user()->name, Auth::user()->apellidos, Auth::user()->email , $transaccion->nro_orden, "2");
       
       return response(json_encode($transaccion->nro_orden),200)->header('Content-type','application/json');     

    }
    
}
