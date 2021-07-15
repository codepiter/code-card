<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
           $table->engine = 'InnoDB';
		   $table->id();
		   
		   $table->foreignId('work_experience_id')->nullable()->constrained()->onDelete('set null');
		   $table->string('position_name', 64);
		   $table->string('description', 512);
		   $table->date('inicio')->nullable()->default(null);
		   $table->date('fin')->nullable()->default(null);
           $table->string('actualidad')->nullable()->default(null);
		   
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
        Schema::dropIfExists('positions');
    }
}
