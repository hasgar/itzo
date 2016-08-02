<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthcareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthcare', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('email', 150);
            $table->text('address');
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('pin', 25);
            $table->string('mobile', 20);
            $table->string('phone', 20)->nullable();
            $table->string('pro_pic',255)->nullable();
            $table->string('website',255)->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('insta',255)->nullable();
            $table->string('gplus',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('latitude',20)->nullable();
            $table->string('longtitude',20)->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('user_id')->unsigned();
            $table->date('payment_till')->default('0000-00-00');
            $table->boolean('is_approved')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::drop('health_care');
    }
}
