<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatimages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_name')->nullable();
            $table->string('message')->nullable();
            $table->string('to_id')->nullable();
            $table->string('to_name')->nullable();
            $table->string('from_id')->nullable();

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
        Schema::dropIfExists('chatimages');
    }
}
