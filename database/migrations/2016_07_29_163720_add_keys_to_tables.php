<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('states', function (Blueprint $table) {
           $table->foreign('country_id')
           ->references('id')->on('countries')
           ->onDelete('cascade');
         });
         Schema::table('cities', function (Blueprint $table) {
           $table->foreign('state_id')
           ->references('id')->on('states')
           ->onDelete('cascade');
         });
          Schema::table('healthcare', function (Blueprint $table) {
           $table->foreign('state_id')
           ->references('id')->on('states')
           ->onDelete('cascade');
           $table->foreign('city_id')
           ->references('id')->on('cities')
           ->onDelete('cascade');
           $table->foreign('country_id')
           ->references('id')->on('countries')
           ->onDelete('cascade');
           $table->foreign('user_id')
           ->references('id')->on('users')
           ->onDelete('cascade');
         });
          Schema::table('user', function (Blueprint $table) {
            $table->foreign('state_id')
           ->references('id')->on('states')
           ->onDelete('cascade');
           $table->foreign('city_id')
           ->references('id')->on('cities')
           ->onDelete('cascade');
           $table->foreign('country_id')
           ->references('id')->on('countries')
           ->onDelete('cascade');
           $table->foreign('user_id')
           ->references('id')->on('users')
           ->onDelete('cascade');
         });
          Schema::table('healthcare_extra_features', function (Blueprint $table) {
           $table->foreign('healthcare_id')
           ->references('id')->on('healthcare')
           ->onDelete('cascade');
           $table->foreign('extra_id')
           ->references('id')->on('extra_features')
           ->onDelete('cascade');
         });
          Schema::table('healthcare_fecilities', function (Blueprint $table) {
           $table->foreign('healthcare_id')
           ->references('id')->on('healthcare')
           ->onDelete('cascade');
           $table->foreign('fecility_id')
           ->references('id')->on('fecilities')
           ->onDelete('cascade');
         });
         Schema::table('photos', function (Blueprint $table) {
           $table->foreign('healthcare_id')
           ->references('id')->on('healthcare')
           ->onDelete('cascade');
         });
         Schema::table('availability', function (Blueprint $table) {
           $table->foreign('healthcare_id')
           ->references('id')->on('healthcare')
           ->onDelete('cascade');
         });
         Schema::table('booking', function (Blueprint $table) {
           $table->foreign('healthcare_id')
           ->references('id')->on('healthcare')
           ->onDelete('cascade');
           $table->foreign('user_id')
           ->references('id')->on('users')
           ->onDelete('cascade');
         }); 
         Schema::table('conversations', function (Blueprint $table) {
           $table->foreign('user_1_id')
           ->references('id')->on('users')
           ->onDelete('cascade');
           $table->foreign('user_2_id')
           ->references('id')->on('users')
           ->onDelete('cascade');
         });
         Schema::table('messages', function (Blueprint $table) {
           $table->foreign('user_id')
           ->references('id')->on('users')
           ->onDelete('cascade');
           $table->foreign('conversation_id')
           ->references('id')->on('conversations')
           ->onDelete('cascade');
         });
         Schema::table('ratings', function (Blueprint $table) {
           $table->foreign('user_id')
           ->references('id')->on('users')
           ->onDelete('cascade');
           $table->foreign('healthcare_id')
           ->references('id')->on('healthcare')
           ->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
