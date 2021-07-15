<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	
	        protected $fillable = [
		         'work_experience_id',
				 'position_name',
				 'description',
				 'inicio',
				 'fin',
				 'actualidad'
	 	];
                 
	            public function workExperience()
				{
					return $this->belongsTo('App\WorkExperience');
				}
}
