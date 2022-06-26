<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boss_scores')->insert([
            'ship_id'=>'1',
            'boss_9_11'=>'8',
            'boss_12_13'=>'8',
            'boss_14'=>'7',
        ]);

        DB::table('boss_scores')->insert([
            'ship_id'=>'2',
            'boss_9_11'=>'6',
            'boss_12_13'=>'3',
            'boss_14'=>'5',
        ]);

        DB::table('boss_scores')->insert([
            'ship_id'=>'3',
            'boss_9_11'=>'3',
            'boss_12_13'=>'3',
            'boss_14'=>'2',
        ]);
    }
}
