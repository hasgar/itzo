<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->integer('user_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('pin', 25)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_verified')->default(1);
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
        Schema::drop('user');
    }
}
