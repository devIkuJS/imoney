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

    public static function enviarNroInversion($name, $email, $nro_orden, $monto_inversion, $moneda, $banco, $banco_destino){
        $data = [
            'name' => $name,
            'email' => $email,
            'nro_orden' => $nro_orden,
            'monto_inversion' => $monto_inversion,
            'moneda' => $moneda,
            'banco_origen' => $banco,
            'banco_destino' => $banco_destino,
        ];
        Mail::to($email)->send(new InversionEmail($data));
    }

}
