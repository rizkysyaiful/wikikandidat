<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date_start')->nullable();
            $table->date('date_finish')->nullable();

            $table->text('text');
            
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');

            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('fact_topic', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('fact_id')->unsigned();
            $table->foreign('fact_id')->references('id')->on('facts');

            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fact_topic');
        Schema::dropIfExists('facts');
    }
}
