<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AericlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('articles')->insert([
            'subject_id' => $faker->numberBetween(1,4),
            'author_name'=> $faker->name,
            'title' => substr( $faker->paragraph ,0,30),
            'img_url' => "images/article/1563699214.png",
            'text_content' =>  $faker->paragraph,
            'published_at' => date('D, d M y'),
            // 'view_count' => $faker->numberBetween(100, 200),
        ]);

        DB::table('articles')->insert([
            'subject_id' => $faker->numberBetween(1,4),
            'author_name'=> $faker->name,
            'title' => substr( $faker->paragraph ,0,30),
            'img_url' => "images/article/1563546407.jpg",
            'text_content' =>  $faker->paragraph,
            'published_at' => date('D, d M y'),
            // 'view_count' => $faker->numberBetween(100, 200),
        ]);

        DB::table('articles')->insert([
            'subject_id' => $faker->numberBetween(1, 4),
            'author_name'=> $faker->name,
            'title' => substr( $faker->paragraph, 0, 30),
            'img_url' => "images/article/1563699214.png",
            'text_content' =>  $faker->paragraph,
            'published_at' => date('D, d M y'),
            // 'view_count' => $faker->numberBetween(100, 200),
        ]);

        DB::table('articles')->insert([
            'subject_id' => $faker->numberBetween(1,4),
            'author_name'=> $faker->name,
            'title' => substr( $faker->paragraph ,0,30),
            'img_url' => "images/article/1563546407.jpg",
            'text_content' =>  $faker->paragraph.$faker->paragraph.$faker->paragraph,
            'published_at' => date('D, d M y'),
            // 'view_count' => $faker->numberBetween(100, 200),
        ]);
    }
}
