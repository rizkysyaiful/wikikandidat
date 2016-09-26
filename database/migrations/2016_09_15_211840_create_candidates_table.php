<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('urlname');
            $table->string('photo_url');

            $table->date('birthdate')->nullable();
            $table->char('birthcity', 64)->nullable();
            $table->date('deathdate')->nullable();
            $table->char('deathcity', 64)->nullable();
            $table->char('national_pin', 16)->nullable(); // 16 is specified to Indonesia

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
        Schema::dropIfExists('candidates');
    }
}
