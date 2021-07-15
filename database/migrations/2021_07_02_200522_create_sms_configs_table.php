<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_configs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
			$table->id();

			$table->foreignId('personal_information_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('personal_information');

	        $table->string('nexmo_key', 128)->nullable();
	        $table->string('nexmo_secret', 128)->nullable();
	        $table->string('recei_numb', 128)->nullable();
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
        Schema::dropIfExists('sms_configs');
    }
}
