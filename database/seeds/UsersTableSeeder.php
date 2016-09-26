<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'rizky@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        /* unfinished work of using factory    
            $factory->define(App\User::class, function (Faker\Generator $faker) use ($factory) {
                return [
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => bcrypt(str_random(10)),
                    'remember_token' => str_random(10),
                ];
            });
        */
    }
}
