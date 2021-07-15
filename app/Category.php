<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
	    'personal_information_id',
		'categ_name'
	 	];
		
	public function tabbedMenu()
	{
		return $this->hasOne('App\TabbedMenu');
	}
	public function personalInformation()
    {
        return $this->belongsTo('App\PersonalInformation');
    }
}
