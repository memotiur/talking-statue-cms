<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopSlideImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_slide_images', function (Blueprint $table) {
            $table->increments('top_logo_id');
            $table->string('image_url');
            $table->unsignedInteger('place_id')->nullable();
            $table->unsignedInteger('statue_id')->nullable();
            $table->unsignedInteger('template_id')->nullable();
            $table->string('top_slidd_url')->nullable();
            $table->string('city_id')->nullable();
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
        Schema::dropIfExists('top_slide_images');
    }
}
