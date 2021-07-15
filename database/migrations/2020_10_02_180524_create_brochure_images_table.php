<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrochureImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brochure_images', function (Blueprint $table) {
            $table->id();
			$table->foreignId('brochure_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('brochures');
			
			
			$table->string('src_msj_inicial', 256)->nullable()->default(null);
			$table->string('src_msj_ppal', 256)->nullable()->default(null);
			$table->string('src_inf_empresa', 256)->nullable()->default(null);
			$table->string('src_pts_fuerts', 256)->nullable()->default(null);
			$table->string('src_beneficios', 256)->nullable()->default(null);
			$table->string('src_adq_serv_prod', 256)->nullable()->default(null);
			$table->string('src_serv_adic', 256)->nullable()->default(null);
			$table->string('src_sociales', 256)->nullable()->default(null);
			$table->string('src_contacto', 256)->nullable()->default(null);
			$table->string('src_backgroundpc', 256)->nullable()->default(null);
			$table->string('src_backgroundpho', 256)->nullable()->default(null);
			$table->string('src_bgpdf1', 256)->nullable()->default(null);
			$table->string('src_bgpdf2', 256)->nullable()->default(null);
			
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
        Schema::dropIfExists('brochure_images');
    }
}
