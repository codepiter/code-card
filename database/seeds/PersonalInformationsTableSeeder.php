<?php

use Illuminate\Database\Seeder;
use App\PersonalInformation;
class PersonalInformationsTableSeeder extends Seeder
{
	
	public $tableName = 'personal_information';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
		 
		 
		 
		$personalInformation = App\PersonalInformation::all()->get();

		$personalInformation->each(function($per_inf){
		   factory(App\Resume::class)->times(1)->create([
		   'personal_information_id' => $per_inf->id
		   ]);
	   });
	   
	   
	   
	   

	   
	   
	   
    }
}
