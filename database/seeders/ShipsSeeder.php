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
            'name'=>'Alabama',
            'hull_id'=>'4',
            'notes'=>'Good timed barrager for mobbing, needs time to ramp up her buff',
            'faction_id'=>'2',
            'rarity_id'=>'4',
            'sprite'=>'alabama.png',
        ]);

        DB::table('ships')->insert([
            'name'=>'Akagi',
            'hull_id'=>'1',
            'notes'=>'Fast launch CV, very good for mobbing when paired with kaga',
            'faction_id'=>'3',
            'rarity_id'=>'4',
            'sprite'=>'akagi.png',

        ]);

        DB::table('ships')->insert([
            'name'=>'Abukuma',
            'hull_id'=>'10',
            'notes'=>'Torp CL that buff DD torp',
            'faction_id'=>'3',
            'rarity_id'=>'3',
            'sprite'=>'abukuma.png',

        ]);

    }
}
