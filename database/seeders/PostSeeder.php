<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Tiering Guidelines',
            'subtitle_1' => 'Summary',
            'body' => 'This tier guide focuses on rating ships for the main campaign stages and is created primarily to help midgame players decide on which ships to invest in.Written by: kaz haias#9401 & Arctic V#8978 with the help of several AL community members. This guide is up to date as of Violet Tempest, Blooming Lycoris (15 Sep 2022)',
            'subtitle_2' => 'Situations',
            'body_2' => 'The ships are rated separately for each situation of campaign W9-11, W12-13, and W14. Each of these situations are further separated into Mob and Boss categories.	',
            'body_3' => 'This tier guide rates ships on a scale from 1-11 with 11 being the highest, based on their performance within the role(s) and situations. The ships are rated based on max level, full retrofit, fate simulation 5, and special augments unless explicitly mentioned otherwise. In order to make a dispute refer to the information page. Ships are not rated with their faction buffer unless stated.',
            'subtitle_4' => 'Disclaimer',
            'body_4' => 'This tier guide is rated based on the writers experience, testing, calculations, and opinions about their performance.',
            'table' => 'ALTG_rating.xlsx',
            'table_caption' => 'Rating guidelines',
        ]);

        DB::table('posts')->insert([
            'title' => 'Lorem Ipsum',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ]);

        DB::table('posts')->insert([
            'title' => 'Lorem ipsum dolor',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ]);

        DB::table('posts')->insert([
            'title' => 'Lorem ipsum dolor sit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ]);

        DB::table('posts')->insert([
            'title' => 'Lorem ipsum dolor sit amet,',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ]);
    }
}
