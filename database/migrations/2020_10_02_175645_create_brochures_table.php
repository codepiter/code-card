<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrochuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brochures', function (Blueprint $table) {
            $table->id();
			
			$table->foreignId('personal_information_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('personal_information');

			$table->string('titlea', 48)->nullable()->default(null);
			$table->string('msj_inicial', 218)->nullable()->default(null);
			$table->string('titleb', 48)->nullable()->default(null);
			$table->string('msj_ppal', 218)->nullable()->default(null);
			$table->string('titlec', 48)->nullable()->default(null);
			$table->string('inf_empresa', 218)->nullable()->default(null);
			$table->string('titled', 48)->nullable()->default(null);
			$table->string('pts_fuerts', 218)->nullable()->default(null);
			$table->string('beneficios', 218)->nullable()->default(null);
			$table->string('adq_serv_prod', 218)->nullable()->default(null);
			$table->string('serv_adic', 218)->nullable()->default(null);
			$table->string('sociales', 218)->nullable()->default(null);
			$table->string('contacto', 218)->nullable()->default(null);
			$table->string('template', 50)->nullable()->default(null);


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
        Schema::dropIfExists('brochures');
    }
}
