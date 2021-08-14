<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionAdminEmailFinanciamiento extends Mailable
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
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

       // dd($this->email_data);
       return $this->from($this->email_data['email'], 'Imoney')->subject("Notificación - Financiamiento de Usuario Registrado")->view('email-notificacion-admin-financiamiento', ['email_data' => $this->email_data]);

    }
}
