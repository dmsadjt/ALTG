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
            'ship_id' => '1',
            'boss_9_11' => '8',
            'boss_12_13' => '8',
            'boss_14' => '7',
        ]);

        DB::table('boss_scores')->insert([
            'ship_id' => '2',
            'boss_9_11' => '6',
            'boss_12_13' => '3',
            'boss_14' => '5',
        ]);

        DB::table('boss_scores')->insert([
            'ship_id' => '3',
            'boss_9_11' => '3',
            'boss_12_13' => '3',
            'boss_14' => '2',
        ]);

        // Continue with entries for ship IDs 4 to 16
        for ($shipId = 4; $shipId <= 16; $shipId++) {
            $boss_9_11 = rand(3, 10); // Generate random score between 3 and 10
            $boss_12_13 = rand(2, 9); // Generate random score between 2 and 9
            $boss_14 = rand(1, 10); // Generate random score between 1 and 10

            DB::table('boss_scores')->insert([
                'ship_id' => $shipId,
                'boss_9_11' => $boss_9_11,
                'boss_12_13' => $boss_12_13,
                'boss_14' => $boss_14,
            ]);
        }
    }
}
