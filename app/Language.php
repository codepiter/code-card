<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $table = "languages";
	
	    protected $fillable = [
		         'name_language'
	 	];
}
