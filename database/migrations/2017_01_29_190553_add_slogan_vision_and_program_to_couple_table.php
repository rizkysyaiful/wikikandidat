<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSloganVisionAndProgramToCoupleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('couples', function (Blueprint $table) {
            //
            $table->text('picture_url')->nullable()->after('running_mate_id');
            $table->text('slogan')->nullable()->after('running_mate_id');
            $table->text('visi')->nullable()->after('running_mate_id');
            $table->text('program')->nullable()->after('running_mate_id');
            $table->text('janji')->nullable()->after('running_mate_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('couples', function (Blueprint $table) {
            //$table->dropColumn('picture_url');
            $table->dropColumn('slogan');
            $table->dropColumn('visi');
            $table->dropColumn('program');
            $table->dropColumn('janji');
        });
    }
}
