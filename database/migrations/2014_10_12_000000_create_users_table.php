<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
            $table->integer('status_id')->nullable()->default(null);
            $table->integer('type_user_id')->nullable()->default(null);
			$table->integer('staff_id')->default(101);
            $table->string('email', 96)->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('username', 32)->nullable()->default(null);
            $table->string('password', 128)->nullable()->default(null);
            $table->tinyInteger('super_user')->nullable()->default(null);
			$table->boolean('is_admin')->default(false);
            $table->string('reset_code', 128)->nullable()->default(null);
            $table->dateTime('reset_time')->nullable()->default(null);
            $table->string('activation_code', 128)->nullable()->default(null);
           // $table->string('remember_token', 128)->nullable()->default(null);
            $table->tinyInteger('active')->nullable()->default(null);
            $table->string('activation_token')->nullable()->default(null);
            $table->tinyInteger('is_activated')->nullable()->default(null);
            $table->dateTime('date_activated')->nullable()->default(null);
            $table->dateTime('last_login')->nullable()->default(null);
			$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
