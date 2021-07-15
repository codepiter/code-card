<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
	    Schema::create('resumes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
			$table->id();
			
			$table->foreignId('personal_information_id')->nullable()->constrained()->onDelete('cascade')->on('personal_information');
			
			$table->integer('status_lab')->nullable()->default(0);
			
        // $table->foreignId('personal_information_id')->references('id')->on('personal_information')->onDelete('cascade');







		   $table->timestamps();
		   
        });
	   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
