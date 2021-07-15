<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class WorkExperience extends Model
{
      public $table = "work_experiences";
				protected $fillable = [
						 'resume_id',
						 'company',
						 'inicio',
						 'fin',
						 'actualidad'
				];


	           public function resume()
				{
					return $this->belongsTo('App\Resume');
				}
				
			   public function position()
				{
					return $this->hasOne('App\Position');
				}
}
