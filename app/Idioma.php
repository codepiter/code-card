<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
     public $table = "idiomas";
	
	    protected $fillable = [
		         'language_id',
		         'resume_id',
		         'level'
	 	];
		
		
		 public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
