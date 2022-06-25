<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ships')->insert([
            'name'=>'Abukuma',
            'hull_id'=>'10',
            'roles'=>'Buffer',
            'position_id'=>'9',
            'notes'=>'Torp CL that buff DD torp',
            'faction_id'=>'3',
            'rarity_id'=>'3',
            'sprite'=>'abukuma.png',
            'mob_911'=>'4',
            'mob_1213'=>'4',
            'mob_14'=>'3',
            'boss_911'=>'3',
            'boss_1213'=>'3',
            'boss_14'=>'2',
        ]);

        DB::table('ships')->insert([
            'name'=>'Alabama',
            'hull_id'=>'4',
            'roles'=>'Timed Barrager',
            'position_id'=>'2',
            'notes'=>'Good timed barrager for mobbing, needs time to ramp up her buff',
            'faction_id'=>'2',
            'rarity_id'=>'4',
            'sprite'=>'alabama.png',
            'mob_911'=>'9',
            'mob_1213'=>'7',
            'mob_14'=>'9',
            'boss_911'=>'7',
            'boss_1213'=>'8',
            'boss_14'=>'7',
        ]);

        DB::table('ships')->insert([
            'name'=>'Akagi',
            'hull_id'=>'1',
            'roles'=>'Fast Launch',
            'position_id'=>'2',
            'notes'=>'Fast launch CV, very good for mobbing when paired with kaga',
            'faction_id'=>'3',
            'rarity_id'=>'4',
            'sprite'=>'akagi.png',
            'mob_911'=>'8',
            'mob_1213'=>'6',
            'mob_14'=>'8',
            'boss_911'=>'6',
            'boss_1213'=>'3',
            'boss_14'=>'5',
        ]);
    }
}
