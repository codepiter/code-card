<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GifCard extends Model
{
	
	public $table = "gifcards";
    protected $fillable = [
		         
				 'customer_id',
				 'identifier',
				 'emition',
				 'expiration',
				 'amount',
				 'coin_id',
				 'status_id',
				 'notes'
	 	];
		
		
		 public function customer()
				{
					return $this->belongsTo('App\Customer');
				}
				
			public function coin()
			{
				return $this->belongsTo('App\Coin');
			}
			
			public function status()
			{
				return $this->belongsTo('App\Status');
			}
			//https://laracasts.com/discuss/channels/eloquent/help-me-understand-the-problem-with-this-hasonethrough-relationship?page=1
			/*La inversa de HasOneThrough no es HasOneThrough sino dos relaciones BelongsTo 

             Puede usar HasOneThroughintercambiando claves externas y locales:*/
			
			public function personalInformation()
				{
					return $this->hasOneThrough('App\PersonalInformation', 'App\Customer', 'id', 'id', 'customer_id', 'personal_information_id');
				}


		
				
				
}