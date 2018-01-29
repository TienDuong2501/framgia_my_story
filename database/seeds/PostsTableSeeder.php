<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as MyFaker;


class PostsTableSeeder extends Seeder
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
            DB::table('posts')->insert([
                'user_id' => $i,
                'image' => $faker->imageUrl($width = 640, $height = 480),
                'title' => $faker->name,
                'brief' => $faker->name,
                'body' => $faker->text,
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
