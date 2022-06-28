<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipArcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ship_archetypes')->insert([
            'ship_id'=> '1',
            'archetype_id' =>'1',
        ]);

        DB::table('ship_archetypes')->insert([
            'ship_id'=> '1',
            'archetype_id' =>'2',
        ]);

        DB::table('ship_archetypes')->insert([
            'ship_id'=> '2',
            'archetype_id' =>'2',
        ]);

        DB::table('ship_archetypes')->insert([
            'ship_id'=> '3',
            'archetype_id' =>'3',
        ]);
    }
}
