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
        Schema::create('home_videos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('video_url');
            $table->string('type');
            $table->string('caption');
            $table->tinyInteger('status')->default(1)->comment('0=pending, 1=published, 2=waiting_for_review, 3=hold, 4=draft');
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
        Schema::dropIfExists('home_videos');
    }
};
