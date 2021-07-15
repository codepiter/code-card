<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
       protected $fillable = [
		 
		 'personal_information_id',
		 'title',
		 'description',
		 'color',
		 'textColor',
		 'email',
		 'phone',
		 'whatsapp',
		 'start',
		 'end',
		 'hora_i',
		 'hora_f',
		 'status',
		 
                               ];
							   
	public function personalInformation()
    {
        return $this->belongsTo('App\PersonalInformation');
    }
}
