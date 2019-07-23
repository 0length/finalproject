<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects') -> insert(
            [
                'name' => 'Food',
                'img_url' => 'images\subject\cookies_102939.png',
                'description' => 'All About Food',
                'index_color' => '#FFECD9',
            ]);
        DB::table('subjects') -> insert(
            [
                'name' => 'Tool',
                'img_url' => 'images\subject\tools2_102885.png',
                'description' => 'All About Tool',
                'index_color' => '#ADD8E6',
            ]);
        DB::table('subjects') -> insert(
            [
                'name' => 'Mobile',
                'img_url' => 'images\subject\mobile_102860.png',
                'description' => 'All About Mobile',
                'index_color' => '#FFB6C1',
            ]);
        DB::table('subjects') -> insert(
            [
                'name' => 'Programming',
                'img_url' => 'images\subject\css_102878.png',
                'description' => 'All About Programming',
                'index_color' => '#E6A8D7',
            ]);
        DB::table('subjects') -> insert(
            [
                'name' => 'Event',
                'img_url' => 'images\subject\appointment_102882.png',
                'description' => 'All About Event',
                'index_color' => '#90EE90',
            ]);

    }
}
