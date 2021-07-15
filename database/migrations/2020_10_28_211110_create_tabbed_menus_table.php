<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabbedMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabbed_menus', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->id();
			$table->foreignId('menu_id')->nullable()->constrained()->onDelete('cascade')->on('menus');
			$table->string('title', 256)->nullable()->default(null);
			$table->string('description', 256)->nullable()->default(null);
			$table->string('price', 256)->nullable()->default(null);
			$table->string('photo1', 256)->nullable()->default(null);
			$table->string('photo2', 256)->nullable()->default(null);
			$table->string('photo3', 256)->nullable()->default(null);
			$table->string('photo4', 256)->nullable()->default(null);
			$table->string('photo5', 256)->nullable()->default(null);
			$table->string('photo6', 256)->nullable()->default(null);
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
        Schema::dropIfExists('tabbed_menus');
    }
}
