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
            'urlname' => 'pilkada-2017-jakarta',
            'vote_date' => '2017-02-15',
            'description' => 'Tes satu dua tiga',
            'place_id' => 2,
        ]);

        DB::table('candidates')->insert([
            'name' => 'Basuki Cahaya Purnama',
            'nickname' => 'Ahok',
            'urlname' => 'basuki_cp',
            'photo_url' => 'http://poskotanews.com/cms/wp-content/uploads/2014/07/Ahok-seragam-DKI-n.jpg',
        ]);
        DB::table('candidates')->insert([
            'name' => 'Djarot Saiful Hidayat',
            'nickname' => 'Djarot',
            'urlname' => 'djarot_sh',
            'photo_url' => 'https://upload.wikimedia.org/wikipedia/id/1/1a/Wagub_DKI_Djarot.jpg',
        ]);
        DB::table('candidates')->insert([
            'name' => 'Agus Harimukti Yudhoyono',
            'nickname' => 'AHY',
            'urlname' => 'agus_hy',
            'photo_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Mayor_Infanteri_Agus_Harimurti_Yudhoyono%2C_M.Sc.%2C_MPA.png/220px-Mayor_Infanteri_Agus_Harimurti_Yudhoyono%2C_M.Sc.%2C_MPA.png',
        ]);
        DB::table('candidates')->insert([
            'name' => 'Sylviana Murni',
            'nickname' => 'Sylvi',
            'urlname' => 'sylviana_m',
            'photo_url' => 'https://upload.wikimedia.org/wikipedia/id/5/54/Sylviana_Murni_%28Wali_Kota_Jakarta_Utara%29.jpg',
        ]);
        DB::table('candidates')->insert([
            'name' => 'Anies Baswedan',
            'nickname' => 'Anies',
            'urlname' => 'anies_b',
            'photo_url' => 'https://upload.wikimedia.org/wikipedia/commons/e/eb/Anies-baswedan-Dec-2010.jpg',
        ]);
        DB::table('candidates')->insert([
            'name' => 'Sandiaga Uno',
            'nickname' => 'Sandi',
            'urlname' => 'sandiaga_u',
            'photo_url' => 'http://1.bp.blogspot.com/-KmRGVWPghSg/Vbzz76KZ-YI/AAAAAAAAFuo/_ZHk4Ygx3yc/s1600/Biografi%2BSandiaga%2BUno.jpg',
        ]);

        DB::table('parties')->insert([
            'name' => 'Partai Demokrasi Indonesia Perjuangan',
            'abbreviation' => 'PDIP'
        ]);
        DB::table('parties')->insert([
            'name' => 'Partian Nasional Demokrat',
            'abbreviation' => 'Nasdem'
        ]);
        DB::table('parties')->insert([
            'name' => 'Partai Demokrat',
            'abbreviation' => 'Demokrat'
        ]);
        DB::table('parties')->insert([
            'name' => 'Partai Keadilan Sejahtera',
            'abbreviation' => 'PKS'
        ]);
        DB::table('parties')->insert([
            'name' => 'Partai Gerakan Indonesia Raya',
            'abbreviation' => 'Gerindra'
        ]);

        DB::table('couples')->insert([
            'election_id' => 1,
            'candidate_id' => 1,
            'running_mate_id' => 2,
        ]);
        DB::table('couples')->insert([
            'election_id' => 1,
            'candidate_id' => 3,
            'running_mate_id' => 4,
        ]);
        DB::table('couples')->insert([
            'election_id' => 1,
            'candidate_id' => 5,
            'running_mate_id' => 6,
        ]);

        DB::table('couple_party')->insert([
            'couple_id' => 1,
            'party_id' => 1
        ]);
        DB::table('couple_party')->insert([
            'couple_id' => 1,
            'party_id' => 2
        ]);
        DB::table('couple_party')->insert([
            'couple_id' => 2,
            'party_id' => 3
        ]);
        DB::table('couple_party')->insert([
            'couple_id' => 3,
            'party_id' => 4
        ]);
        DB::table('couple_party')->insert([
            'couple_id' => 3,
            'party_id' => 5
        ]);

        DB::table('types')->insert([
            'name' => 'Pendidikan',
        ]);
        DB::table('types')->insert([
            'name' => 'Karir',
        ]);
        DB::table('types')->insert([
            'name' => 'Kontribusi ke Organisasi',
        ]);
        DB::table('types')->insert([
            'name' => 'Prestasi',
        ]);
        DB::table('types')->insert([
            'name' => 'Kontroversi',
        ]);
        DB::table('types')->insert([
            'name' => 'Kutipan',
        ]);

        DB::table('topics')->insert([
            'name' => 'Tata Kota'
        ]);
        DB::table('topics')->insert([
            'name' => 'Wirausaha'
        ]);
        DB::table('topics')->insert([
            'name' => 'Lingkungan'
        ]);

        DB::table('universities')->insert([
            'name' => 'Universitas Indonesia',
            'abbreviation' => 'UI',
            'place_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Rizky Syaiful',
            'username' => 'rizkysyaiful',
            'email' => 'rizky.syaiful@gmail.com',
            'password' => bcrypt('secret'),
            'is_verifier' => false,
            'national_pin' => 3674022904900002,
            'phone_number' => '089678601060',
        ]);

        DB::table('users')->insert([
            'name' => 'Mahasiswi 1',
            'username' => 'tes1',
            'email' => 'tes1@gmail.com',
            'password' => bcrypt('secret'),
            'is_verifier' => true,
            'national_pin' => 3674022904900003,
            'phone_number' => '08967860106',
            'university_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Mahasiswi 2',
            'username' => 'tes2',
            'email' => 'tes2@gmail.com',
            'password' => bcrypt('secret'),
            'is_verifier' => true,
            'national_pin' => 3674022904900004,
            'phone_number' => '0896786010',
            'university_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Mahasiswi 3',
            'username' => 'tes3',
            'email' => 'tes3@gmail.com',
            'password' => bcrypt('secret'),
            'is_verifier' => true,
            'national_pin' => 3674022904900005,
            'phone_number' => '089678601',
            'university_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Mahasiswi 4',
            'username' => 'tes4',
            'email' => 'tes4@gmail.com',
            'password' => bcrypt('secret'),
            'is_verifier' => true,
            'national_pin' => 3674022904900006,
            'phone_number' => '08967860',
            'university_id' => 1,
        ]);

    }
}
