<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
	protected $fillable = [
		         'name_s'
	 	];
		
		public function gifcards()
    {
        return $this->hasMany('App\GifCard');
    }
}
