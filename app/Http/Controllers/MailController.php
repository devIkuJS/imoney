<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use App\Mail\TransaccionEmail;
use App\Mail\NotificacionAdminEmail;
use App\Mail\TransaccionFinalEmail;
use App\Mail\TransaccionErrorEmail;
use App\Mail\InversionEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'email' => $email,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function enviarOperacion($tipo_cambio,$name, $email, $nro_orden, $montoA, $descripcionMontoA, $montoB, $descripcionMontoB, $banco_origen, $banco_destino){
        $data = [
            'name' => $name,
            'email' => $email,
            'nro_orden' => $nro_orden,
            'montoA' => $montoA,
            'descripcionMontoA' => $descripcionMontoA,
            'montoB' => $montoB,
            'descripcionMontoB' => $descripcionMontoB,
            'banco_origen' => $banco_origen,
            'banco_destino' => $banco_destino,
            'tipo_cambio' => $tipo_cambio,
        ];

        $idrol = DB::table('roles')
        ->select('roles.id', 'roles.name')
        ->where('roles.id', Auth::user()->tipo_id)
        ->get();
    
        if($idrol[0]->id == 3 || $idrol[0]->id == 4){
            $cuentaSelected = DB::table('persona_operaciones')
            ->join('empresa', 'empresa.id', '=', 'persona_operaciones.empresa_id')
            ->select('empresa.razon_social')
            ->where('persona_operaciones.user_id', Auth::id())
            ->get();
            
            $data['razon_social'] = $cuentaSelected[0]->razon_social;
            
        }else if ($idrol[0]->id == 2){
            $data['razon_social'] = Auth::user()->name." ". Auth::user()->apellidos;  
        }
        Mail::to($email)->send(new TransaccionEmail($data));
    }

    public static function notificarOperacion($name, $apellidos, $email, $nro_orden, $estado_id){
        $data = [
            'name' => $name,
            'apellidos' => $apellidos,
            'email' => $email,
            'nro_orden' => $nro_orden,
            'estado_id' => $estado_id,
        ];

        //Mail::to('brian125865@gmail.com')->send(new NotificacionAdminEmail($data));
       Mail::to('hector.andia@imoney.pe')->cc(['franco.mosso@imoney.pe','roger.bastidas@imoney.pe'])->send(new NotificacionAdminEmail($data));
    }

    public static function finalizarOperacion($tipo_cambio,$name, $email, $nro_orden, $montoA, $descripcionMontoA, $montoB, $descripcionMontoB, $banco_origen, $banco_destino){
        $data = [
            'tipo_cambio' => $tipo_cambio,
            'name' => $name,
            'email' => $email,
            'nro_orden' => $nro_orden,
            'montoA' => $montoA,
            'descripcionMontoA' => $descripcionMontoA,
            'montoB' => $montoB,
            'descripcionMontoB' => $descripcionMontoB,
            'banco_origen' => $banco_origen,
            'banco_destino' => $banco_destino,
           
        ];
        Mail::to($email)->send(new TransaccionFinalEmail($data));
    }

    public static function errorOperacion($name, $email, $nro_orden, $montoA, $descripcionMontoA, $montoB, $descripcionMontoB, $banco_origen, $banco_destino){
        $data = [
            'name' => $name,
            'email' => $email,
            'nro_orden' => $nro_orden,
            'montoA' => $montoA,
            'descripcionMontoA' => $descripcionMontoA,
            'montoB' => $montoB,
            'descripcionMontoB' => $descripcionMontoB,
            'banco_origen' => $banco_origen,
            'banco_destino' => $banco_destino,
        ];
        Mail::to($email)->send(new TransaccionErrorEmail($data));
    }

    public static function enviarNroInversion($name, $email, $nro_orden, $monto_inversion,$cantidad_dias,$monto_esperado,$fecha_esperada, $moneda, $banco, $banco_destino){
        $data = [
            'name' => $name,
            'email' => $email,
            'nro_orden' => $nro_orden,
            'monto_inversion' => $monto_inversion,
            'cantidad_dias' => $cantidad_dias,
            'monto_esperado' => $monto_esperado,
            'fecha_esperada' => $fecha_esperada,
            'moneda' => $moneda,
            'banco_origen' => $banco,
            'banco_destino' => $banco_destino,
        ];
        Mail::to($email)->send(new InversionEmail($data));
    }

}
