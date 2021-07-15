<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    public $table = "habilidades";
	
	    protected $fillable = [
		         'resume_id',
		         'skill_id',
		         'medida'
	 	];
	

	
	
	               public function resume()
					{
						return $this->belongsTo('App\Resume');
					
					}
					
					
	 public function skill()
    {
        return $this->belongsTo('App\Skill');
    }
					
					
					
					
}
