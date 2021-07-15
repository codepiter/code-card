<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
			$table->foreignId('personal_information_id')->nullable()->constrained()->onDelete('cascade')->on('personal_information');
			$table->integer('status_id')->unsigned()->nullable()->default(1);
			
			$table->string('slug', 150)->nullable()->default(null)->unique();
			$table->string('logo', 256)->nullable()->default(null);
			$table->string('fondo', 256)->nullable()->default(null);
			$table->string('restaurant', 256)->nullable()->default(null);
			$table->string('address', 256)->nullable()->default(null);
			$table->string('sze_font_rest', 256)->nullable()->default(null);
			$table->string('sze_font_add', 256)->nullable()->default(null);
			$table->string('color_font_rest', 256)->nullable()->default(null);
			$table->string('color_font_add', 256)->nullable()->default(null);
			$table->string('letra_font_rest', 256)->nullable()->default(null);
			$table->string('letra_font_add', 256)->nullable()->default(null);
			$table->string('size_font_title', 256)->nullable()->default(null);
			$table->string('size_font_descr', 256)->nullable()->default(null);
			$table->string('size_font_price', 256)->nullable()->default(null);
			$table->string('color_font_title', 256)->nullable()->default(null);
			$table->string('color_font_descr', 256)->nullable()->default(null);
			$table->string('color_font_price', 256)->nullable()->default(null);
			$table->string('letra_title', 256)->nullable()->default(null);
			$table->string('letra_descr', 256)->nullable()->default(null);
			$table->string('letra_price', 256)->nullable()->default(null);
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
        Schema::dropIfExists('menus');
    }
}
