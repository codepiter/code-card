<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidades', function (Blueprint $table) {
			 $table->engine = 'InnoDB';
            $table->id();
			
			$table->foreignId('skill_id')->nullable()->constrained()->onDelete('set null')->on('skills');
			$table->foreignId('resume_id')->nullable()->constrained()->onDelete('set null')->on('resumes');
			
			
			
			$table->integer('medida')->nullable();
			
			
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
        Schema::dropIfExists('habilidades');
    }
}
