<?php

use Illuminate\Database\Seeder;
//use App\PersonalInformation;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//User::truncate(); //OR
		//User::query()->delete();
	   $users = factory(App\User::class)->times(34)->create();
	   
	   App\User::create([
		'staff_id'         => 101,
		'email'            => 'codepiter@gmail.com',
		'email_verified_at'=> '2020-01-07 10:55:28',
		'username'         => 'codepiter',
		'password'         => bcrypt('11111111'),
		'is_admin'         => 1,
		]);
		
		 App\User::create([
		'staff_id'         => 101,
		'email'            => 'sergio@pracsac.com',
		'email_verified_at'=> '2020-01-07 10:55:28',
		'username'         => 'sergio',
		'password'         => bcrypt('87654321'),
		'is_admin'         => 1,
		]);
		
		App\User::create([
		'staff_id'         => 101,
		'email'            => 'info@busswe.com',
		'email_verified_at'=> '2020-01-07 10:55:28',
		'username'         => 'info',
		'password'         => bcrypt('12345678'),
		'is_admin'         => 1,
		]);

       $users->each(function($user){
		   factory(App\PersonalInformation::class)->times(1)->create([
		   'user_id' => $user->id
		   ]);
	   });

	   /* //Rimon
        factory(App\User::class, 19)->create();
		
		App\User::create([
		'staff_id'         => 101,
		'email'            => 'codepiter@gmail.com',
		'email_verified_at'=> '2020-05-25 09:39:28',
		'username'         => 'codepiter',
		'password'         => bcrypt('11111111'),
		'is_admin'         => 1,
		]);*/
		//----------------------------------------
		
		/*
		Role::create([
			'name'    => 'Admin',
			'slug'    => 'admin',
			'special' => 'all-access',
		]);*/
		
    }
}
