<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    
	public $table = "pagos";
	protected $fillable = [
		         'personal_information_id',
		         'fecha_pago',
				 'n_pago',
				 'payment',
				 'invoice',
				 'amount',
				 'payment_mode',
				 'notes'
	 	];

		
			public function personalInformation()
			{
				return $this->belongsTo('App\PersonalInformation');
			}


}