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

            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');

            $table->integer('running_mate_id')->unsigned()->nullable();
            $table->foreign('running_mate_id')->references('id')->on('candidates');

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
        Schema::dropIfExists('couples');
    }
}
