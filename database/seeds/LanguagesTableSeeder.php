<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Language::create([
		'name_language' => 'English',
		]);
		
        App\Language::create([
		'name_language' => 'Epanish',
		]);
		
		
		App\Language::create([
		'name_language' => 'Portugues',
		]);
		
		App\Language::create([
		'name_language' => 'Italiano',
		]);
		
		App\Language::create([
		'name_language' => 'Frances',
		]);
		
    }
}
