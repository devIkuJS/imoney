<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operacion;
use App\Models\TipoCambio;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\MailController;

class OperacionController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {   
    $estado_transaccion = DB::table('estado_operacion')
                          ->where('id', '>=', 3)
                          ->get();          

    $operaciones = DB::table('operacion')
            ->join('users', 'operacion.user_id', '=', 'users.id')
            ->join('bancos', 'operacion.banco_origen_id', '=', 'bancos.id')
            ->join('cuenta_bancarias', 'operacion.banco_destino_id', '=', 'cuenta_bancarias.id')
            ->join('estado_operacion', 'operacion.estado_id', '=', 'estado_operacion.id')
            ->leftjoin('status_nro_operacion', 'operacion.id', '=', 'status_nro_operacion.operacion_id')
            ->select('operacion.*','users.name AS nombre_usuario' , 'users.apellidos AS apellido_usuario' ,
             'bancos.name AS banco_origen', 'cuenta_bancarias.numero_cuenta AS numero_cuenta', 
             'estado_operacion.name AS estado', 'status_nro_operacion.nro_operacion AS nro_operacion', 
             'status_nro_operacion.voucher_operacion AS voucher' , 'status_nro_operacion.id AS id_voucher',
             DB::raw("(SELECT `bancos`.`name`
             FROM `cuenta_bancarias`
             inner join `bancos` on `cuenta_bancarias`.`banco_id` = `bancos`.`id`
             where `cuenta_bancarias`.`id` = `operacion`.`banco_destino_id`) AS `banco_destino`"),
             DB::raw("(
              SELECT `categoria_cuenta`.`name`  
              FROM `cuenta_bancarias`
              inner join `categoria_cuenta` on `cuenta_bancarias`.`categoria_cuenta_id` = `categoria_cuenta`.`id`
              where `cuenta_bancarias`.`id` = `operacion`.`banco_destino_id`
              ) AS `tipo_cuenta`"))
            ->get();
          
    	return view('admin.operaciones.index' , ['operaciones' => $operaciones, 'estado_transaccion' => $estado_transaccion]);
    }

    public function actualizar(Request $request, $operacionId)
    {
      $transaccion = DB::table('operacion')
      ->join('bancos', 'operacion.banco_origen_id', '=', 'bancos.id')
      ->join('users', 'operacion.user_id', '=', 'users.id')
      ->select('operacion.*', 'bancos.name AS banco' ,'users.name AS name_usuario', 'users.email AS mail_usuario', DB::raw("(SELECT `bancos`.`name`
      FROM `cuenta_bancarias`
      inner join `bancos` on `cuenta_bancarias`.`banco_id` = `bancos`.`id`
      where `cuenta_bancarias`.`id` = `operacion`.`banco_destino_id`) AS `banco_destino`")  )
      ->where('operacion.id', $operacionId)
      ->get();
      
    	$operacion = Operacion::find($operacionId);
    	$operacion->estado_id = $request->estado_transaccion;
      $operacion->updated_at = now();
    	$operacion->save();
      

      if($request->estado_transaccion === "3"){

        MailController::finalizarOperacion($transaccion[0]->name_usuario, $transaccion[0]->mail_usuario , $transaccion[0]->nro_orden, $transaccion[0]->montoA, $transaccion[0]->descripcionMontoA,  $transaccion[0]->montoB, $transaccion[0]->descripcionMontoB, $transaccion[0]->banco , $transaccion[0]->banco_destino);

      }else if($request->estado_transaccion === "4"){

        MailController::errorOperacion($transaccion[0]->name_usuario, $transaccion[0]->mail_usuario , $transaccion[0]->nro_orden, $transaccion[0]->montoA, $transaccion[0]->descripcionMontoA,  $transaccion[0]->montoB, $transaccion[0]->descripcionMontoB, $transaccion[0]->banco , $transaccion[0]->banco_destino);
      }

     
    	return redirect()->back();
    }

}
