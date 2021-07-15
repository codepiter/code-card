<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
public $table = "coins";
	protected $fillable = [
		         'name_c',
				 'symbol'
	 	];
		
		public function gifcards()
    {
        return $this->hasMany('App\GifCard');
    }
}
