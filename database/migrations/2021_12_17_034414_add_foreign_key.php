<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table customers
        Schema::table('customers', function ($table){
            $table->foreign('deparment_id')->references('id')->on('deparments');
            $table->foreign('city_id')->references('id')->on('cities');
        });

        //table cities
        Schema::table('cities', function ($table){
            $table->foreign('deparment_id')->references('id')->on('deparments');
        });

        //table winners
        Schema::table('winners', function ($table){
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Tabla customers
        Schema::table('customers', function ($table) {
            $table->dropForeign(['deparment_id']);
            $table->dropForeign(['city_id']);
        });

        //Tabla cities
        Schema::table('cities', function ($table) {
            $table->dropForeign(['deparment_id']);
        });

        //Tabla winner
        Schema::table('winners', function ($table) {
            $table->dropForeign(['customer_id']);
        });
    }
}
