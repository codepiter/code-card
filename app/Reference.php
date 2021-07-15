<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    				protected $fillable = [
						 'resume_id',
						 'nombre',
						 'telefono'
				];
				
				  public function resume()
				{
					return $this->belongsTo('App\Resume');
				}
}
