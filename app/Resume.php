<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
   
               
                 protected $fillable = [
		         'personal_information_id'
	 	           ];

		        public function personalInformation()
				{
					return $this->belongsTo('App\PersonalInformation');
				}
				
				 public function workExperience() //revisar esta funcion
				{
					return $this->hasOne('App\WorkExperience');
				}
				
				 public function formation()
				{
					return $this->belongsTo('App\Formation');
				}

					
				   public function habilidades()
					{
						//return $this->hasMany('App\Habilidad', 'resume_id');
						return $this->hasMany('App\Habilidad');
					}
				
				
				  public function idiomas()
					{
						//return $this->hasMany('App\Habilidad', 'resume_id');
						return $this->hasMany('App\Idioma');
					}
				
				 public function references()
				{
					return $this->hasMany('App\Reference');
				}
				
				
		
}
