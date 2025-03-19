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
            'gear_name' => 'Quadruple 330mm (Mle 1931)',
            'gear_rarity' => 'n',
            'gear_type' => '1',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Triple 203mm (8"/55 Mk 13)',
            'gear_rarity' => 'e',
            'gear_type' => '2',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Single 150mm (SK C/28)',
            'gear_rarity' => 'r',
            'gear_type' => '3',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Single 100mm (Type 88)',
            'gear_rarity' => 'r',
            'gear_type' => '4',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Surface Torpedo',
            'gear_rarity' => 'sr',
            'gear_type' => '5',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Submarine-mounted Type 95 Kai Pure Oxygen Torpedo',
            'gear_rarity' => 'ur',
            'gear_type' => '6',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Lavochkin La-9 (Carrier-based Prototype)',
            'gear_rarity' => 'ur',
            'gear_type' => '7',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Douglas A-1 Skyraider',
            'gear_rarity' => 'e',
            'gear_type' => '8',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Douglas TBD Devastator',
            'gear_rarity' => 'n',
            'gear_type' => '9',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Aichi M6A Seiran',
            'gear_rarity' => 'ur',
            'gear_type' => '10',
        ]);
        DB::table('gears')->insert([
            'gear_name' => 'Sextuple 40mm Bofors',
            'gear_rarity' => 'sr',
            'gear_type' => '11',
        ]);

        DB::table('gears')->insert([
            'gear_name' => 'Admiralty Fire Control Table',
            'gear_rarity' => 'ur',
            'gear_type' => '12',
        ]);

        DB::table('gears')->insert([
            'gear_name' => 'Augment',
            'gear_rarity' => 'sr',
            'gear_type' => '13',
        ]);

        DB::table('templates')->insert([
            'name' => 'Test Template',
            'build' => 'General',
        ]);

        DB::table('templates')->insert([
            'name' => 'Test Template 2',
            'build' => 'Light',
        ]);

        DB::table('templates')->insert([
            'name' => 'Test Template 3',
            'build' => 'Medium',
        ]);

        DB::table('templates')->insert([
            'name' => 'Test Template 4',
            'build' => 'Heavy',
        ]);
    }
}
