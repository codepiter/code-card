<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			
		   $table->foreignId('language_id')->nullable()->constrained()->onDelete('cascade')->on('languages');
		   $table->foreignId('resume_id')->nullable()->constrained()->onDelete('cascade')->on('resumes');
			$table->integer('level')->nullable();
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
        Schema::dropIfExists('idiomas');
    }
}
