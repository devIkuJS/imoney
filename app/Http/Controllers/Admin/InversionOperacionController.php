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
            ->leftjoin('status_nro_inversion', 'inversion_operacion.id', '=', 'status_nro_inversion.operacion_id')
            ->select('inversion_operacion.*','users.name AS nombre_usuario' , 'users.apellidos AS apellido_usuario' ,
             'bancos.name AS banco_origen', 'cuenta_bancarias.numero_cuenta AS numero_cuenta', 
             'estado_operacion.name AS estado', 'status_nro_inversion.nro_operacion AS nro_operacion', 
             'status_nro_inversion.voucher_operacion AS voucher' , 'status_nro_inversion.id AS id_voucher',
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


}
