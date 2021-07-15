<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
			//personal_information_id
			 $table->foreignId('personal_information_id')->nullable()->constrained()->onDelete('cascade')->on('personal_information');
			 $table->string('title', 128)->nullable()->default(null);
             $table->string('description', 128)->nullable()->default(null);
             $table->string('color', 128)->nullable()->default(null);
             $table->string('textColor', 128)->nullable()->default(null);
            
			 $table->string('nombre', 128)->nullable()->default(null);
             $table->string('asunto', 128)->nullable()->default(null);
             $table->string('email', 128)->nullable()->default(null);
             $table->string('phone', 128)->nullable()->default(null);
             $table->string('whatsapp', 128)->nullable()->default(null);
             
			 
			 $table->date('start')->nullable()->default(null);
             $table->date('end')->nullable()->default(null);
             $table->time('hora_i')->nullable()->default(null);
             $table->time('hora_f')->nullable()->default(null);
			 $table->string('status', 12)->nullable()->default('waiting');
			
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
        Schema::dropIfExists('events');
    }
}
