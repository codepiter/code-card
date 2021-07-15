<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			
			$table->foreignId('resume_id')->nullable()->constrained()->onDelete('set null')->on('resumes');
		   $table->string('instituto_name', 64);
		   $table->boolean('culminado');
		   $table->string('titulo_obtenido', 64);
		   $table->date('inicio')->nullable()->default(null);
		   $table->date('fin')->nullable()->default(null);
			
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
        Schema::dropIfExists('formations');
    }
}
