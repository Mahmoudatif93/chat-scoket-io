<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tsnef')->nullable();
            $table->string('store_name')->nullable();
            $table->string('store_mobile')->nullable();
            $table->string('store_address')->nullable();
            $table->integer('Governorate')->nullable();
            $table->integer('City')->nullable();
            $table->string('logo')->nullable();
            $table->string('long_map')->nullable();
            $table->string('lat_map')->nullable();
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
        Schema::dropIfExists('add_stores');
    }
}
