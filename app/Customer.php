<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
	//public $table = "customers";
    protected $fillable = [
		         
				 'personal_information_id',
				 'doc_id',
				 'first_name',
				 'last_name',
				 'date_birth',
				 'telephone',
				 'email',
				 'address',
				 'photo'
	 	];
	
	
	
	
	
	public function personalInformation()
    {
        return $this->belongsTo('App\PersonalInformation');
    }
	
	
	public function gifCards()
    {
        return $this->hasMany('App\GifCard');
    }
}
