<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
 if (!Schema::hasTable('pagos')) {
	   Schema::create('pagos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			$table->foreignId('personal_information_id')->nullable()->constrained()->onDelete('cascade')->on('personal_information');
		  //$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
             $table->date('fecha_pago')->nullable()->default(null);
			 $table->string('n_pago', 50);
			 $table->string('invoice', 50);
			 $table->decimal('amount', 8, 2)->nullable()->default(null);
			 $table->string('payment_mode', 50);
			 $table->string('notes', 50);

			$table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}