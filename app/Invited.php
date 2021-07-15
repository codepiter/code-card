<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invited extends Model
{
   protected $fillable = [
		         'nombre',
				 'apellido',
				 'email',
				 'telefono',
				 'codig'
	 	];
}
