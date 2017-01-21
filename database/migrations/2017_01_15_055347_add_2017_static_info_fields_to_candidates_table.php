<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2017StaticInfoFieldsToCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->text('pendidikan')->nullable()->after('photo_url');
            $table->text('karir')->nullable()->after('photo_url');
            $table->text('penghargaan')->nullable()->after('photo_url');
            $table->text('sumber_pemerintah')->nullable()->after('photo_url');
            $table->text('sumber_non_pemerintah')->nullable()->after('photo_url');
            $table->integer('election_id')->nullable()->after('id');
            $table->integer('entrier_id')->nullable()->after('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn('pendidikan');
            $table->dropColumn('karir');
            $table->dropColumn('penghargaan');
            $table->dropColumn('sumber_pemerintah');
            $table->dropColumn('sumber_non_pemerintah');
            $table->dropColumn('election_id');
            $table->dropColumn('entrier_id');
        });
    }
}
