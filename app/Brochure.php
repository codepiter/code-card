<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brochure extends Model
{
    protected $fillable = [
		'personal_information_id',
		
		'titlea',
		'msj_inicial',
		'titleb',
		'msj_ppal',
		'titlec',
		'inf_empresa',
		'titled',
		'pts_fuerts',
		
		
		'beneficios',
		'adq_serv_prod',
		'serv_adic',
		'sociales',
		'contacto',
		'template'

	 	];

        public function personalInformation()
				{
					return $this->belongsTo('App\PersonalInformation');
				}

		public function brochureImage()
				{
					return $this->hasOne('App\BrochureImage');
				}
				
}
