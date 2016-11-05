<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');

            $table->boolean('is_rejected')->nullable();
            $table->string('rejection_reason')->nullable();

            $table->bigInteger('fact_id')->unsigned()->nullable();
            $table->foreign('fact_id')->references('id')->on('facts');

            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types');

            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates');

            $table->integer('submitter_id')->unsigned();
            $table->foreign('submitter_id')->references('id')->on('users');

            $table->integer('first_verifier_id')->unsigned()->nullable();
            $table->foreign('first_verifier_id')->references('id')->on('users');

            $table->integer('second_verifier_id')->unsigned()->nullable();
            $table->foreign('second_verifier_id')->references('id')->on('users');

            $table->integer('third_verifier_id')->unsigned()->nullable();
            $table->foreign('third_verifier_id')->references('id')->on('users');

            $table->softDeletes();
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
        Schema::dropIfExists('submissions');
    }
}
