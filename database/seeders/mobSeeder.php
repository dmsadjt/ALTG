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
            'ship_id' => '1',
            'mob_9_11' => '9',
            'mob_12_13' => '7',
            'mob_14' => '9',
            'mob_15' => '10'
        ]);

        DB::table('mob_scores')->insert([
            'ship_id' => '2',
            'mob_9_11' => '8',
            'mob_12_13' => '6',
            'mob_14' => '8',
            'mob_15' => '8'
        ]);

        DB::table('mob_scores')->insert([
            'ship_id' => '3',
            'mob_9_11' => '4',
            'mob_12_13' => '4',
            'mob_14' => '3',
            'mob_15' => '2'
        ]);

        // Continue with entries for ship IDs 4 to 16
        for ($shipId = 4; $shipId <= 16; $shipId++) {
            $mob_9_11 = rand(3, 10); // Generate random score between 3 and 10
            $mob_12_13 = rand(2, 9); // Generate random score between 2 and 9
            $mob_14 = rand(1, 10); // Generate random score between 1 and 10
            $mob_15 = rand(1, 10); // Generate random score between 1 and 10

            DB::table('mob_scores')->insert([
                'ship_id' => $shipId,
                'mob_9_11' => $mob_9_11,
                'mob_12_13' => $mob_12_13,
                'mob_14' => $mob_14,
                'mob_15' => $mob_15
            ]);
        }
    }
}
