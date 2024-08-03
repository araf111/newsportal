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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('ad_page');
            $table->string('ad_number');
            $table->string('ad_position');
            $table->string('image');
            $table->string('ad_link');
            $table->tinyInteger('status')->default(1)->comment('0=inactive, 1=active, 2=waiting_for_review, 3=hold, 4=draft');
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
        Schema::dropIfExists('advertisements');
    }
};