<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class email_admin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $tipo;
    private $email_admin;
    private $cita;

    public function __construct($tipo, $email_admin, $cita)
    {
        $this->tipo = $tipo;
        $this->email_admin = $email_admin;
        $this->cita = $cita;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if ($this->tipo == 'Confirmada'){
            return $this
                ->from($this->email_admin)
                ->subject('Confirmación de cita '.$this->cita->consecutivo_cita)
                ->view('email.confirmacion_admin')
                    ->with('cita',$this->cita);
        }else{

            if ($this->tipo == 'Cancelada'){
                return $this
                    ->from($this->email_admin)
                    ->subject('Cancelación de cita '.$this->cita->consecutivo_cita)
                    ->view('email.cancelacion_admin')
                        ->with('cita',$this->cita);
            }

        }

    }
}
