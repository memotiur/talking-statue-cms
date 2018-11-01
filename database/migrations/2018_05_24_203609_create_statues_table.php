<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statues', function (Blueprint $table) {
            $table->increments('statue_id');
            $table->string('statue_name');
            $table->double('latitude');
            $table->double('longitude');
            $table->unsignedInteger('city');
            $table->unsignedInteger('template_id');
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('audio_url')->nullable();
            $table->double('range_radius')->nullable();
            $table->string('description')->nullable();
            $table->string('web_address')->nullable();
            $table->string('qr_code')->nullable();
            $table->boolean('qr_code_on')->default(true);
            $table->boolean('gps_on')->default(true);
            $table->boolean('statue_active')->default(true);
            $table->string('keywords')->nullable();
            $table->string('label')->nullable();
            $table->timestamps();
            //$table->foreign('city')->references('city_id')->on('cities');
            //$table->foreign('template_id')->references('template_id')->on('templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statues');
    }
}
