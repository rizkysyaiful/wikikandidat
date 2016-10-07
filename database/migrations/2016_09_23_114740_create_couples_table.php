<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couples', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('election_id')->unsigned();
            $table->foreign('election_id')->references('id')->on('elections');

            $table->tinyInteger('order')->unsigned()->nullable();    

            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');

            $table->integer('running_mate_id')->unsigned()->nullable();
            $table->foreign('running_mate_id')->references('id')->on('candidates');

            $table->timestamps();
        });

        Schema::create('couple_party', function(Blueprint $table){
            $table->increments('id');

            $table->integer('couple_id')->unsigned();
            $table->foreign('couple_id')->references('id')->on('couples');

            $table->integer('party_id')->unsigned();
            $table->foreign('party_id')->references('id')->on('parties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('couple_party');
        Schema::dropIfExists('couples');
    }
}
