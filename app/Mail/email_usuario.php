<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Parametro;

class email_usuario extends Mailable
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
        //return $this->view('view.confirmacion_usuario.blade');

        if ($this->tipo == 'Por confirmar'){
            return $this
                ->from($this->email_admin)
                ->subject('Nueva cita por confirmar '.$this->cita->consecutivo_cita)
                ->view('email.cita_por_confirmar_usuario')
                    ->with('cita',$this->cita);
        }else{

            if ($this->tipo == 'Confirmada'){
                return $this
                    ->from($this->email_admin)
                    ->subject('Confirmación de cita '.$this->cita[0]->consecutivo_cita)
                    ->view('email.confirmacion_usuario')
                        ->with('cita',$this->cita);
            }else{


                if ($this->tipo == 'Cancelada'){
                    return $this
                        ->from($this->email_admin)
                        ->subject('Cancelación de cita '.$this->cita[0]->consecutivo_cita)
                        ->view('email.cancelacion_usuario')
                            ->with('cita',$this->cita);
                }

            }
        }
        

    }
}
