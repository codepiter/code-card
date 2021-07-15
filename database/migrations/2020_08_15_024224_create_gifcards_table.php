<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGifcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifcards', function (Blueprint $table) {
			
            $table->id();
			$table->foreignId('customer_id')->nullable()->constrained()->onDelete('cascade')->on('customers');
			$table->foreignId('coin_id')->nullable()->constrained()->onDelete('cascade')->on('coins');
			$table->foreignId('status_id')->nullable()->constrained()->onDelete('cascade')->on('statuses');
			
			
			
			$table->uuid('identifier', 550);
			$table->date('emition')->nullable()->default(null);
			$table->date('expiration')->nullable()->default(null);
			
			$table->decimal('amount', 8, 2)->nullable()->default(null);

			$table->string('notes', 512)->nullable()->default(null);

			
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
        Schema::dropIfExists('gifcards');
    }
}