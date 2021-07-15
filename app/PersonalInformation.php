<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PersonalInformation extends Model
{
         protected $fillable = [
		         /*ids y otros*/
				 'slug',
				 'slug_calendar',
				 'status_id',
				 'user_id',
				 'cv',
				 'template',
				 /*Datos Personales*/
				 'first_name',
				 'last_name',
				 'correo',
				 'date_birth',
				 'telephone',
				 /*Datos de Empresa*/
				 'company',
				 'position',
				 'puesto',
				 
				 'presentation',
				 'services',
				 'we',
				 /*Ubication*/
				 'address',
				 'url_map',
				 'pais',
				 'nationality',
				 /*Imagenes y Colores de la Tarjeta*/
				 'background',
				 'header',
				 'photo',
				 'favi',
				 'favi2',
				 'photo2',
				 'photo3',
				 'carr1',
				 'carr2',
				 'carr3',
				 'carr4',
				 'carr5',
				 'carr6',
				 'logo',
				 'logo2',
				 'logo3',
				 'logo4',
				 'logo5',
				 'logo6',
				 'qr',
				 'qr2',
				 
				 
				 'days_lab',
				 'hora_inicio',
				 'hora_fin',
				 'intervalo',
				 'inicio_receso',
				 'fin_receso',
				 
				 //'vcard',//????
				/*Redes Sociales*/
				 'whatsapp',
				 'facebook',
				 'youtube',
				 'twitter',
				 'instagram',
				 'linkedin',
				 'paypalme',
				 'np2',
				 'pasarela2',
				 'serv_prod'
	 	];

				public function user()
				{
					return $this->belongsTo('App\User');
				}

				public function path() 
				{
				  return url("/card/{$this->slug}");
				}
				
				public function pathCalendar() 
				{
				  return url("/{$this->slug_calendar}");
				}
				
				public function resume()
				{
					return $this->hasOne('App\Resume');
				}
				
				
				public function brochure()
				{
					return $this->hasOne('App\Brochure');
				}
				
				
				 public function pagos()
				{
					return $this->hasMany('App\Pago');
				}
				
				public function customers()
				{
					return $this->hasMany('App\Customer');
				}

				public function events()
				{
					return $this->hasMany('App\Event');
				}
				
				public function menu()
				{
					return $this->hasMany('App\Menu');
				}
				
				public function categories()
				{
					return $this->hasMany('App\Category');
				}
			
}
