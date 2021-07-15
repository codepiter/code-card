<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Skill::create([
		'habilidad' => 'Office',
		]);
		
        App\Skill::create([
		'habilidad' => 'Excel',
		]);
		
		
		App\Skill::create([
		'habilidad' => 'Power Point',
		]);
		
		App\Skill::create([
		'habilidad' => 'Ilustrator',
		]);
		
		App\Skill::create([
		'habilidad' => 'html5',
		]);
		
		App\Skill::create([
		'habilidad' => 'Javascript',
		]);
		
    }
}
