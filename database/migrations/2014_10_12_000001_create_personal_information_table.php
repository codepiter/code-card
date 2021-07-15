<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'personal_information';

    /**
     * Run the migrations.
     * @table tables
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
			
			$table->string('slug', 150)->nullable()->default(null)->unique();
			$table->string('slug_calendar', 256)->nullable()->default(null)->unique();
	
			$table->integer('status_id')->unsigned()->nullable()->default(1);
			
			//$table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
			$table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->on('users');

            $table->integer('cv')->nullable()->default(0);
            $table->integer('status_lab')->nullable()->default(0);
            $table->integer('template')->nullable();

			$table->string('first_name', 50);
            $table->string('last_name', 50)->nullable()->default(null);
            $table->string('correo', 60)->nullable()->default(null);
            $table->date('date_birth')->nullable()->default(null);
			$table->string('telephone', 32)->nullable()->default(null);
			$table->string('website', 320)->nullable()->default(null);
			
			$table->string('company', 128)->nullable()->default(null);
			$table->string('position', 128)->nullable()->default(null);
			$table->string('puesto', 128)->nullable()->default(null);
			$table->string('presentation', 1840)->nullable()->default(null);
			$table->string('services', 1840)->nullable()->default(null);
			$table->string('we', 1840)->nullable()->default(null);
			$table->string('address', 320)->nullable()->default(null);
			$table->string('url_map', 320)->nullable()->default(null);
			$table->string('pais', 320)->nullable()->default(null);
			
			$table->string('whatsapp', 128)->nullable()->default(null);
			$table->string('facebook', 128)->nullable()->default(null);
			$table->string('dribbble', 128)->nullable()->default(null);
			$table->string('twitter', 128)->nullable()->default(null);
			$table->string('instagram', 128)->nullable()->default(null);
			$table->string('linkedin', 128)->nullable()->default(null);
			$table->string('paypalme', 128)->nullable()->default(null);
			$table->string('np2', 128)->nullable()->default(null);
			$table->string('pasarela2', 128)->nullable()->default(null);
			$table->string('serv_prod', 128)->nullable()->default(null);

			$table->tinyInteger('nationality')->nullable()->default(null);
			$table->string('background', 15)->nullable()->default(null);
			$table->string('header', 128)->nullable()->default(null);
			$table->string('photo', 128)->nullable()->default(null);
			$table->string('favi', 128)->nullable()->default(null);
			$table->string('favi2', 128)->nullable()->default(null);
			$table->string('photo2', 128)->nullable()->default(null);
			$table->string('photo3', 128)->nullable()->default(null);		
			
			$table->string('carr1', 128)->nullable()->default(null);
			$table->string('carr2', 128)->nullable()->default(null);
			$table->string('carr3', 128)->nullable()->default(null);
			$table->string('carr4', 128)->nullable()->default(null);
			$table->string('carr5', 128)->nullable()->default(null);
			$table->string('carr6', 128)->nullable()->default(null);
			
			$table->string('logo', 128)->nullable()->default(null);
			$table->string('logo2', 128)->nullable()->default(null);
			$table->string('logo3', 128)->nullable()->default(null);
			$table->string('logo4', 128)->nullable()->default(null);
			$table->string('logo5', 128)->nullable()->default(null);
			$table->string('logo6', 128)->nullable()->default(null);
			$table->string('qr', 128)->nullable()->default(null);
			$table->string('qr2', 128)->nullable()->default(null);
			
			$table->string('days_lab', 128)->nullable()->default(null);
			$table->time('hora_inicio')->nullable()->default(null);
			$table->time('hora_fin')->nullable()->default(null);
			$table->string('intervalo', 64)->nullable()->default(null);

			$table->time('inicio_receso')->nullable()->default(null);
			$table->time('fin_receso')->nullable()->default(null);

			$table->timestamps();
			
			
			
			
			
			
			
			
			
			
			
			
			//$table->foreignId('user_id')->references('id')->on('users'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
