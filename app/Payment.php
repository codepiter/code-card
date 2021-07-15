<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   public $table = "payments";
	protected $fillable = [
		         'user_id',
		         'amount',
				 'payment_mode',
				 'type_card'
				
	 	];
		
		public function user()
			{
				return $this->belongsTo('App\User');
			}
}
