<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ship_positions')->insert([
            'ship_id'=>'1',
            'position_id'=>'12',
        ]);

        DB::table('ship_positions')->insert([
            'ship_id'=>'2',
            'position_id'=>'8',
        ]);

        DB::table('ship_positions')->insert([
            'ship_id'=>'3',
            'position_id'=>'11',
        ]);
    }
}
