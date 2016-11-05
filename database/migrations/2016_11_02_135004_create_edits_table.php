<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edits', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('text');

            $table->date('date_start')->nullable();
            $table->date('date_finish')->nullable();

            $table->string('comment')->nullable();

            $table->bigInteger('submission_id')->unsigned();
            $table->foreign('submission_id')->references('id')->on('submissions');

            $table->integer('verifier_id')->unsigned();
            $table->foreign('verifier_id')->references('id')->on('users');

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
        Schema::dropIfExists('edits');
    }
}
