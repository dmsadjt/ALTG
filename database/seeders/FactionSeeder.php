<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factions')->insert([
            'faction_name'=>'Iron Blood',
            'faction_tag'=>'IB',
            'faction_img'=>'iron-blood.png',
            'faction_slug'=>'iron',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Eagle Union',
            'faction_tag'=>'EU',
            'faction_img'=>'eagle-union.png',
            'faction_slug'=>'eagle',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Sakura Empire',
            'faction_tag'=>'SE',
            'faction_img'=>'sakura-empire.png',
            'faction_slug'=>'sakura',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Royal Navy',
            'faction_tag'=>'RN',
            'faction_img'=>'royal-navy.png',
            'faction_slug'=>'royal',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Sardegna Empire',
            'faction_tag'=>'RM',
            'faction_img'=>'sardegna-empire.png',
            'faction_slug'=>'sardegna',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Vichya Dominion',
            'faction_tag'=>'VD',
            'faction_img'=>'vichya-dominion.png',
            'faction_slug'=>'vichya',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Iris Libre',
            'faction_tag'=>'IL',
            'faction_img'=>'iris-libre.png',
            'faction_slug'=>'iris',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Northern Parliament',
            'faction_tag'=>'NP',
            'faction_img'=>'northern-parliament.png',
            'faction_slug'=>'parliament',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Dragon Empery',
            'faction_tag'=>'DE',
            'faction_img'=>'dragon-empery.png',
            'faction_slug'=>'dragon',
        ]);

        DB::table('factions')->insert([
            'faction_name'=>'Other',
            'faction_tag'=>'O*',
            'faction_img'=>'other.png',
            'faction_slug'=>'other',
        ]);
    }
}