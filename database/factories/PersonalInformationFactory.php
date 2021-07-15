<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PersonalInformation;
use Faker\Generator as Faker;
//use Illuminate\Support\Str;

$factory->define(PersonalInformation::class, function (Faker $faker) {
    return [
		// id
		// status_id
		// user_id
		//'slug' => rand(1, 17),
        'cv' => rand(0, 1),
		'slug' => $faker->unique()->userName,
		'template' => rand(1, 17),
		'first_name' => $faker->name,
	    'last_name' => $faker->lastName,
		'date_birth' => $faker->date,
		'telephone'=> $faker->phoneNumber,
		'company' => $faker->name,
		'position' => $faker->name,
		'presentation' => 'El marketing es mi pasión y estoy convencido que la manera como lo estamos trabajando hoy en día no refleja aun todo el potencial que podemos llegar a alcanzar en beneficio de las marcas, creo que estamos en una etapa media del crecimiento de las grandes estrategias de marketing.',
		
		'services' => 'Branding
Creación de marcas y su desarrollo
Marca Personal - Heroe
Merca Empresarial
Generación de estrategias de venta
Generación de Leads
Campañas en RRSS',

		'we' => 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

		'address' => $faker->address,
		'whatsapp' => $faker->phoneNumber,
		'facebook' => $faker->name,
		'dribbble' => $faker->name,
		'twitter' => $faker->name,
		'instagram' => $faker->name,
		'calend_gmail' => $faker->name,
		'serv_prod'=> $faker->randomElement(['Mis Servicios','Mis Productos']),
		
		
		
		
		//'nationality' => $faker->name,
		//'photo' => $faker->name,
		//'logo' => $faker->name,

		
    ];
});
