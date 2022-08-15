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
            'gear_rarity'=>'n',
            'gear_type'=>'1',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Heavy Cruiser Gun',
            'gear_rarity'=>'e',
            'gear_type'=>'2',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Light Cruiser Gun',
            'gear_rarity'=>'r',
            'gear_type'=>'3',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Destroyer Gun',
            'gear_rarity'=>'r',
            'gear_type'=>'4',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Surface Torpedo',
            'gear_rarity'=>'sr',
            'gear_type'=>'5',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Submarine Torpedo',
            'gear_rarity'=>'ur',
            'gear_type'=>'6',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Fighter',
            'gear_rarity'=>'ur',
            'gear_type'=>'7',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Dive Bomber',
            'gear_rarity'=>'e',
            'gear_type'=>'8',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Torpedo Bomber',
            'gear_rarity'=>'n',
            'gear_type'=>'9',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'Seaplane',
            'gear_rarity'=>'ur',
            'gear_type'=>'10',
        ]);
        DB::table('gears')->insert([
            'gear_name'=>'AA Gun',
            'gear_rarity'=>'sr',
            'gear_type'=>'11',
        ]);

        DB::table('gears')->insert([
            'gear_name'=>'Auxiliary Equipment',
            'gear_rarity'=>'ur',
            'gear_type'=>'12',
        ]);

        DB::table('gears')->insert([
            'gear_name'=>'Augment',
            'gear_rarity'=>'sr',
            'gear_type'=>'13',
        ]);

        DB::table('templates')->insert([
            'name'=>'Test Template',
            'build'=>'General',
        ]);

    }
}
