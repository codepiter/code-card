<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
			$table->foreignId('personal_information_id')->nullable()->constrained()->onDelete('cascade')->on('personal_information');
			$table->foreignId('status_id')->nullable()->constrained()->onDelete('cascade')->on('statuses');
			$table->string('doc_id', 64)->nullable()->default(null);
			$table->string('first_name', 64)->nullable()->default(null);
			$table->string('last_name', 64)->nullable()->default(null);
			$table->date('date_birth')->nullable()->default(null);
			$table->string('telephone', 64)->nullable()->default(null);
			$table->string('email', 64)->nullable()->default(null);
			$table->string('address', 64)->nullable()->default(null);
			$table->string('photo', 256)->nullable()->default(null);
			
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
        Schema::dropIfExists('customers');
    }
}
