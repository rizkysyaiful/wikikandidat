<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContributorFieldsToElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elections', function (Blueprint $table) {
            //
            $table->string('initiator')->nullable()->after('place_id');
            $table->text('promoters')->nullable()->after('place_id');
            $table->integer('cp')->unsigned()->nullable()->after('place_id');
        });

        Schema::table('elections', function (Blueprint $table) {
            $table->foreign('cp')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elections', function (Blueprint $table) {
            $table->dropColumn('initiator');
            $table->dropColumn('promoters');
            $table->dropForeign('cp');
        });
    }
}
