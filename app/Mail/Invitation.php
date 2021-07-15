<?php

namespace App\Mail;

use App\Invited;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 
	public $invited;
	  
	  
    public function __construct(Invited $invited)
    {
        $this->invited = $invited;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		
	
        return $this->view('emails.invitation')->subject('Perfil Interactivo');
					
					
			
       
    }
}
