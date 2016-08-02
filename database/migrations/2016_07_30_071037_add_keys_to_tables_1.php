<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeysToTables1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('healthcare_types', function (Blueprint $table) {
            $table->foreign('healthcare_id')
           ->references('id')->on('healthcare')
           ->onDelete('cascade');
           $table->foreign('type_id')
           ->references('id')->on('types')
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
