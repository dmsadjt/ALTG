<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class mobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mob_scores')->insert([
            'ship_id'=>'1',
            'mob_9_11'=>'9',
            'mob_12_13'=>'7',
            'mob_14'=>'9',
        ]);

        DB::table('mob_scores')->insert([
            'ship_id'=>'2',
            'mob_9_11'=>'8',
            'mob_12_13'=>'6',
            'mob_14'=>'8',
        ]);

        DB::table('mob_scores')->insert([
            'ship_id'=>'3',
            'mob_9_11'=>'4',
            'mob_12_13'=>'4',
            'mob_14'=>'3',
        ]);
    }
}
