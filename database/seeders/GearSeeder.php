<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gears')->insert([
            'gear_name'=>'Battleship Gun',
            'gear_type'=>'Battleship Gun',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Heavy Cruiser Gun',
            'gear_type'=>'Heavy Cruiser Gun',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Light Cruiser Gun',
            'gear_type'=>'Light Cruiser Gun',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Destroyer Gun',
            'gear_type'=>'Destroyer Gun',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Surface Torpedo',
            'gear_type'=>'Surface Torpedo',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Submarine Torpedo',
            'gear_type'=>'Submarine Torpedo',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Fighter',
            'gear_type'=>'Fighter',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Dive Bomber',
            'gear_type'=>'Dive Bomber',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Torpedo Bomber',
            'gear_type'=>'Torpedo Bomber',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Seaplane',
            'gear_type'=>'Seaplane',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'AA Gun',
            'gear_type'=>'AA Gun',
        ]);

        DB::table('gears')->insert([
            'gear_name'=>'Auxiliary Equipment',
            'gear_type'=>'Auxiliary Equipment',
        ]);

        DB::table('gears')->insert([
            'gear_name'=>'Augment',
            'gear_type'=>'Augment',
        ]);

    }
}
