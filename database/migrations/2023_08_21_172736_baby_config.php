<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BabyConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baby_config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('baby_code')->nullable();
            $table->integer('milk_expiration_in_hours')->nullable();
            $table->integer('need_feed_in_hours')->nullable();
            $table->string('added_by')->nullable();
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
        Schema::dropIfExists('baby_config');
    }
}
