<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
				 'habilidad'
	 	];
		
		
		
		
		
		
		
		public function habilidad()
    {
        return $this->hasOne('App\Habilidad');
    }
		
		
		
		
}
