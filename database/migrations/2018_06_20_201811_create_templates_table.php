<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('template_id');
            $table->string('templates_name');
            $table->string('templates_description')->nullable();
            $table->string('templates_image')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_description')->nullable();
            $table->string('templates_image2')->nullable();
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
        Schema::dropIfExists('templates');
    }
}
