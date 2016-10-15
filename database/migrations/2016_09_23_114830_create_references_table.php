<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('eternal_url');
            $table->string('photo_id')->nullable();
            $table->boolean('is_againts_fact')->default(false);
            $table->boolean('is_anon')->default(false);

            $table->boolean('is_rejected')->nullable();
            $table->string('rejection_reason')->nullable();

            $table->bigInteger('fact_id')->unsigned();
            $table->foreign('fact_id')->references('id')->on('facts');

            $table->integer('submitter_id')->unsigned()->nullable();
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
        Schema::dropIfExists('references');
    }
}
