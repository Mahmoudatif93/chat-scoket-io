<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissingFoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_found', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->integer('type');
            $table->string('name')->nullable();
            $table->integer('category_id_fk')->nullable();
            $table->integer('govern_id_fk')->nullable();
            $table->integer('city_id_fk')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('missing_found');
    }
}
