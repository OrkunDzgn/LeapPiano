<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('score_id');
            $table->unsignedInteger('song_id');
            $table->unsignedInteger('id');
            $table->integer('score');
        });


        Schema::table('scores', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('song_id')->references('song_id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
