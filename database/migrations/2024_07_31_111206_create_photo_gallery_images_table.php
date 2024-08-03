<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_gallery_images', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->string('image');
            $table->unsignedBigInteger('photo_gallery_id');
            $table->timestamps();

            $table->foreign('photo_gallery_id')->references('id')->on('photo_galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_gallery_images');
    }
};
