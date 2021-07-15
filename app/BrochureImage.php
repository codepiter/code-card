<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrochureImage extends Model
{
	  protected $fillable = [
				'src_msj_inicial',
                'src_msj_ppal',
	 	        'src_inf_empresa',
	            'src_pts_fuerts',
	            'src_beneficios',
                'src_adq_serv_prod',
				'src_serv_adic',
				'src_sociales',
				'src_contacto',
				'src_backgroundpc',
				'src_backgroundpho',
				'src_bgpdf1',
				'src_bgpdf2',
				
				];
}
