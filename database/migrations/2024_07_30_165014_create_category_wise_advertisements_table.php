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
        Schema::create('category_wise_advertisements', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('ad_page');
            $table->string('ad_number');
            $table->string('ad_position');
            $table->string('image');
            $table->string('ad_link');
            $table->integer('category_id');
            $table->tinyInteger('status')->default(1)->comment('0=inactive, 1=active, 2=waiting_for_review, 3=hold, 4=draft');
            $table->timestamps();

            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_wise_advertisements');
    }
};
