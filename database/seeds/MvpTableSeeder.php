<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MvpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidates')->insert([
            'name' => 'Tri Rismaharini',
            'urlname' => 'trismaharini',
            'photo_url' => 'http://speakerdata.s3.amazonaws.com/photo/image/848865/Tri_Rismaharini1.jpg',
        ]);
        DB::table('candidates')->insert([
            'name' => 'Basuki Cahaya Purnama',
            'urlname' => 'basukicp',
            'photo_url' => 'http://poskotanews.com/cms/wp-content/uploads/2014/07/Ahok-seragam-DKI-n.jpg',
        ]);

        DB::table('types')->insert([
            'name' => 'Educations',
        ]);
        DB::table('types')->insert([
            'name' => 'Careers',
        ]);
        DB::table('types')->insert([
            'name' => 'Contributions',
        ]);
        DB::table('types')->insert([
            'name' => 'Achievements',
        ]);
        DB::table('types')->insert([
            'name' => 'Controversies',
        ]);
        DB::table('types')->insert([
            'name' => 'Quotes',
        ]);

		DB::table('facts')->insert([
            'year_start' => 2010,
            'year_end' => 2016,
            'text' => 'Walikota Surabaya',
            'type_id' => 2,
            'candidate_id' => 1,
        ]);
		DB::table('facts')->insert([
            'year_start' => 2008,
            'year_end' => 2016,
            'text' => 'Kepala Badan Perencanaan Pembangunan Kota Surabaya',
            'type_id' => 2,
            'candidate_id' => 1,
        ]);
        DB::table('facts')->insert([
            'year_start' => 2016,
            'year_end' => 2016,
            'text' => 'Dewan Penasihat Asosiasi Arsitek Indonesia',
            'type_id' => 3,
            'candidate_id' => 1,
        ]);
        DB::table('facts')->insert([
            'year_start' => null,
            'year_end' => 2002,
            'text' => 'Pascasarjana Manajemen Pembangunan Kota di ITS (Lulus)',
            'type_id' => 1,
            'candidate_id' => 1,
        ]);
        DB::table('facts')->insert([
            'year_start' => null,
            'year_end' => 2015,
            'text' => 'Laporan PT. Gala Bumi Perkasa, atas lalai membongkar pasar Turi',
            'type_id' => 5,
            'candidate_id' => 1,
        ]);

        DB::table('places')->insert([
        	'name' => 'Banten',
        	'level' => 1,
        ]);
        DB::table('places')->insert([
        	'name' => 'DKI Jakarta',
        	'level' => 1,
        ]);
        DB::table('places')->insert([
        	'name' => 'Kota Tangerang',
        	'level' => 2,
        	'parent_id' => 1,
        ]);

        DB::table('elections')->insert([
        	'name' => 'Pilkada 2017',
        	'is_gov' => true,
        	'vote_date' => '2017-02-15',
        	'description' => 'Tes satu dua tiga',
        	'place_id' => 2,
        ]);

        DB::table('couples')->insert([
        	'election_id' => 1,
        	'candidate_id' => 1,
        	'running_mate_id' => 2,
        ]);
        DB::table('couples')->insert([
        	'election_id' => 1,
        	'candidate_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Rizky Syaiful',
            'email' => 'rizky@gmail.com',
            'password' => bcrypt('secret'),
            'is_verifier' => false,
        ]);

        DB::table('references')->insert([
        	'eternal_url' => 'https://web.archive.org/web/20160916120336/http://www.surabaya.go.id/berita/8058-daftar-nama-&-alamat-walikota,-sekdakota-dan-asisten-pemerintah-kota-surabaya',
        	'photo_url' => 'http://speakerdata.s3.amazonaws.com/photo/image/848865/Tri_Rismaharini1.jpg',
        	'fact_id' => 1,
        	'submitter_id' => 1,
        ]);

        DB::table('universities')->insert([
        	'name' => 'Universitas Indonesia',
        	'abbreviation' => 'UI',
        	'place_id' => 2,
        ]);

		DB::table('verifications')->insert([
        	'reference_id' => 1,
        	'verifier_id' => 1,
        ]);

    }
}
