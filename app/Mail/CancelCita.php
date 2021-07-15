<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancelCita extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 
    public $name;
    public $tlf;
    public $motivo;
	
    public function __construct($name, $tlf, $motivo)
    {
         $this->name = $name;
         $this->tlf = $tlf;
         $this->motivo = $motivo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cancelacion')->subject('Solicitud de Cancelación');
    }
}
