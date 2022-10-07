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
            'name' => 'Alabama',
            'hull_id' => '4',
            'notes' => 'Good timed barrager for mobbing, needs time to ramp up her buff',
            'faction_id' => '2',
            'rarity_id' => '4',
            'position_id' => '4',
            'sprite' => 'ships/img/sprite/alabama.png',
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id'=>'4',

        ]);

        DB::table('ships')->insert([
            'name' => 'Akagi',
            'hull_id' => '1',
            'notes' => 'Fast launch CV, very good for mobbing when paired with kaga',
            'faction_id' => '3',
            'position_id' => '3',
            'rarity_id' => '4',
            'sprite' => 'ships/img/sprite/akagi.png',
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id'=>'4',


        ]);

        DB::table('ships')->insert([
            'name' => 'Abukuma',
            'hull_id' => '7',
            'notes' => 'Torp CL that buff DD torp',
            'faction_id' => '3',
            'rarity_id' => '3',
            'position_id' => '2',
            'sprite' => 'ships/img/sprite/abukuma.png',
            'chibi_sprite' => 'ships/img/chibi/abukuma.png',
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id'=>'4',

        ]);
    }
}
