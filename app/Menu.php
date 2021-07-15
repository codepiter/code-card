<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	             protected $fillable = [
                 'personal_information_id',
                 'status_id',
				 'slug',

				 'logo',
				 'fondo',

				 'restaurant',
				 'address',
				 'sze_font_rest',
                 'sze_font_add',
                 'color_font_rest',
                 'color_font_add' ,
                 'letra_font_rest',
				 'letra_font_add',
				 'size_font_title',
				 'size_font_descr',
				 'size_font_price',
				 'color_font_title',
				 'color_font_descr',
				 'color_font_price',
				 'letra_title',
				 'letra_descr',
				 'letra_price',
				 ];

	public function personalInformation()
	{
		return $this->belongsTo('App\PersonalInformation');
	}
	public function path() 
	{
	  return url("/menus/{$this->slug}");
	}
	public function tabbedMenu()
	{
		return $this->hasOne('App\TabbedMenu');
	}
}


