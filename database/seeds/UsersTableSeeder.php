<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as MyFaker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = MyFaker::create();
        for ($i = 1; $i < 10; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->name,
                'verify_token' => $faker->text,
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
