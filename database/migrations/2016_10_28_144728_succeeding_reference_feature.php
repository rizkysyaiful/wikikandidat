<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SucceedingReferenceFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->bigInteger('successor_id')->unsigned()->nullable()->after('eternal_url');
        });
        Schema::table('references', function (Blueprint $table) {
            $table->foreign('successor_id')->references('id')->on('references');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->dropColumn('successor_id');
        });
    }
}
