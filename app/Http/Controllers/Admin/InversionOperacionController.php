<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InversionOperacion;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\MailController;

class InversionOperacionController extends Controller
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

        $operaciones = DB::table('inversion_operacion')
            ->join('users', 'inversion_operacion.user_id', '=', 'users.id')
            ->join('bancos', 'inversion_operacion.banco_origen_id', '=', 'bancos.id')
            ->join('cuenta_bancarias', 'inversion_operacion.banco_destino_id', '=', 'cuenta_bancarias.id')
            ->join('estado_operacion', 'inversion_operacion.estado_id', '=', 'estado_operacion.id')
            ->join('tipo_cuentas', 'inversion_operacion.moneda_id', '=', 'tipo_cuentas.id')
            ->join('empresa_inversiones', 'inversion_operacion.empresa_id', '=', 'empresa_inversiones.id')
            ->leftjoin('status_nro_inversion', 'inversion_operacion.id', '=', 'status_nro_inversion.operacion_id')
            ->select('inversion_operacion.*','users.name AS nombre_usuario' , 'users.apellidos AS apellido_usuario',
             'bancos.name AS banco_origen', 'tipo_cuentas.name AS moneda','cuenta_bancarias.numero_cuenta AS numero_cuenta', 
             'estado_operacion.name AS estado', 'status_nro_inversion.nro_operacion AS nro_operacion', 
             'status_nro_inversion.voucher_operacion AS voucher' , 'status_nro_inversion.id AS id_voucher','empresa_inversiones.serie_num_comprobante AS codigo_factura',
             DB::raw("(SELECT `bancos`.`name`
             FROM `cuenta_bancarias`
             inner join `bancos` on `cuenta_bancarias`.`banco_id` = `bancos`.`id`
             where `cuenta_bancarias`.`id` = `inversion_operacion`.`banco_destino_id`) AS `banco_destino`"),
             DB::raw("(
              SELECT `categoria_cuenta`.`name`  
              FROM `cuenta_bancarias`
              inner join `categoria_cuenta` on `cuenta_bancarias`.`categoria_cuenta_id` = `categoria_cuenta`.`id`
              where `cuenta_bancarias`.`id` = `inversion_operacion`.`banco_destino_id`
              ) AS `tipo_cuenta`"))
            ->get();

    	return view('admin.operaciones-inversion.index' , ['operaciones' => $operaciones, 'estado_transaccion' => $estado_transaccion]);
        //return view('admin.operaciones-inversion.index');
    }

    public function actualizar(Request $request, $operacionId)
    {
      $transaccion = DB::table('inversion_operacion')
      ->join('bancos', 'inversion_operacion.banco_origen_id', '=', 'bancos.id')
      ->join('users', 'inversion_operacion.user_id', '=', 'users.id')
      ->join('tipo_cuentas', 'inversion_operacion.moneda_id', '=', 'tipo_cuentas.id')
      ->join('empresa_inversiones', 'inversion_operacion.empresa_id', '=', 'empresa_inversiones.id')
      ->select('inversion_operacion.*', 'bancos.name AS banco' ,'users.name AS name_usuario', 'users.email AS mail_usuario','tipo_cuentas.name AS moneda', 'empresa_inversiones.serie_num_comprobante AS codigo_factura', DB::raw("(SELECT `bancos`.`name`
      FROM `cuenta_bancarias`
      inner join `bancos` on `cuenta_bancarias`.`banco_id` = `bancos`.`id`
      where `cuenta_bancarias`.`id` = `inversion_operacion`.`banco_destino_id`) AS `banco_destino`")  )
      ->where('inversion_operacion.id', $operacionId)
      ->get();
      
      $operacion = InversionOperacion::find($operacionId);
      $operacion->estado_id = $request->estado_transaccion;
      $operacion->updated_at = now();
      $operacion->save();
      //$transaccion->tipo_cambio = $request->tipo_cambio;
      
      if($request->estado_transaccion === "3"){

        MailController::finalizarOperacionInversion($transaccion[0]->name_usuario, $transaccion[0]->mail_usuario, $transaccion[0]->moneda, $transaccion[0]->nro_orden, $transaccion[0]->monto_inversion, $transaccion[0]->monto_esperado,  $transaccion[0]->banco , $transaccion[0]->banco_destino, $transaccion[0]->codigo_factura);

      }else if($request->estado_transaccion === "4"){

        MailController::errorOperacionInversion($transaccion[0]->name_usuario, $transaccion[0]->mail_usuario, $transaccion[0]->moneda, $transaccion[0]->nro_orden, $transaccion[0]->monto_inversion, $transaccion[0]->monto_esperado, $transaccion[0]->banco , $transaccion[0]->banco_destino,$transaccion[0]->codigo_factura);
      }

     
    	return redirect()->back();
    }

}
