<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabbedMenu extends Model
{
   
    protected $fillable = [
		         'menu_id',
				 'status_id',
				 'category_id',
		         'title',
		         'description',
		         'price',
		         'photo1',
		         'photo2',
		         'photo3',
		         'photo4',
		         'photo5',
		         'photo6',
	 	];
		
	   public function menu()
		{
			return $this->belongsTo('App\Menu');
		}
	   public function category()
		{
			return $this->belongsTo('App\Category');
		}
		
}
