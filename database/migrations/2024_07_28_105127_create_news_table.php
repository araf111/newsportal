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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->string('slug');
            $table->string('sub_title')->nullable();
            $table->string('description');
            $table->string('youtube_video')->nullable();
            $table->string('facebook_video')->nullable();
            $table->integer('opinionWriter_id');
            $table->string('feature_image')->nullable();
            $table->integer('news_type_id')->default(0);
            $table->unsignedBigInteger('news_heading_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('writer_id');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->bigInteger('visitorCount')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending, 1=published, 2=waiting_for_review, 3=hold, 4=draft');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('news_heading_id')->references('id')->on('news_headings')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('writer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
