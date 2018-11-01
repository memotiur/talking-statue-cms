<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('place_id');
            $table->string('place_name');
            $table->unsignedInteger('city_id');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->string('details')->nullable();
            $table->string('place_image')->nullable();
            $table->string('place_web_url')->nullable();
            $table->string('place_address')->nullable();
            $table->string('opening_weekdays')->nullable();
            $table->timestamps();
            $table->foreign('city_id')->references('city_id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
