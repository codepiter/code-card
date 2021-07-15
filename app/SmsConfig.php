<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsConfig extends Model
{
   protected $fillable = [
		         'personal_information_id',
				 'nexmo_key',
				 'nexmo_secret',
				 'recei_numb',
	 	];
		public function userProfile()
	{
		return $this->belongsTo('App\Models\UserProfile');
	}
}
