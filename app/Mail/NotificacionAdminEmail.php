<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    { 
        $this->email_data = $data;
        //dd($this->email_data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

       if($this->email_data['estado_id'] === "1"){

        return $this->from('no-reply@imoney.pe', 'Imoney')->subject("Notificación - Operación de Usuario Registrada")->view('email-notificacion-admin', ['email_data' => $this->email_data]);

       }else{

        return $this->from('no-reply@imoney.pe', 'Imoney')->subject("Notificación - Voucher de usuario enviado")->view('email-notificacion-admin', ['email_data' => $this->email_data]);

       }
       

       
       

    }
}
