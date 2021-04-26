<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operacion;
use Illuminate\Support\Facades\DB;

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
            ->select('operacion.*', 'users.name AS nombre_usuario' , 'users.apellidos AS apellido_usuario' ,
             'bancos.name AS banco_origen', 'cuenta_bancarias.numero_cuenta AS numero_cuenta', 
             'estado_operacion.name AS estado', 'status_nro_operacion.nro_operacion AS nro_operacion', 
             'status_nro_operacion.voucher_operacion AS voucher' , 'status_nro_operacion.id AS id_voucher')
            ->get();
          
    	return view('admin.operaciones.index' , ['operaciones' => $operaciones, 'estado_transaccion' => $estado_transaccion]);
    }

    public function actualizar(Request $request, $operacionId)
    {
    	$operacion = Operacion::find($operacionId);
    	$operacion->estado_id = $request->estado_transaccion;
      $operacion->updated_at = now();
    	$operacion->save();
    	return redirect()->back();
    }

}
