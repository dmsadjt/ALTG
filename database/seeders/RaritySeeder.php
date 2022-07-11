<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rarities')->insert([
            'rarity_name'=>'Common',
            'rarity_tag'=>'N',
            'rarity_slug'=>'common',
            'rarity_image'=>'common.png',
        ]);

        DB::table('rarities')->insert([
            'rarity_name'=>'Elite',
            'rarity_tag'=>'E',
            'rarity_slug'=>'elite',
            'rarity_image'=>'elite.png',
        ]);

        DB::table('rarities')->insert([
            'rarity_name'=>'Rare',
            'rarity_tag'=>'R',
            'rarity_slug'=>'rare',
            'rarity_image'=>'rare.png',
        ]);

        DB::table('rarities')->insert([
            'rarity_name'=>'Super rare',
            'rarity_tag'=>'SR',
            'rarity_slug'=>'super-rare',
            'rarity_image'=>'super-rare.png',
        ]);

        DB::table('rarities')->insert([
            'rarity_name'=>'Ultra Rare',
            'rarity_tag'=>'UR',
            'rarity_slug'=>'ultra-rare',
            'rarity_image'=>'ultra-rare.png',
        ]);
    }
}
