<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
            protected $fillable = [
		         'resume_id',
		         'instituto_name',
				 'culminado',
				 'titulo_obtenido',
				 'inicio',
				 'fin'

	 	];

		        public function resume()
				{
					return $this->hasOne('App\Resume');
				}
	
}
