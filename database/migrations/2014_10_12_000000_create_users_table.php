<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->unique();
            $table->bigInteger('national_pin')->unique();
            $table->string('pin_card_photo_url')->nullable();

            
            $table->boolean('is_verifier')->default(false);
            $table->date('join_verifier_date')->nullable();
            $table->date('exit_verifier_date')->nullable();
            $table->integer('university_id')->unsigned()->nullable();
            $table->foreign('university_id')->references('id')->on('universities');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
