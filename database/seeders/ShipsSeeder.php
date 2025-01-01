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
            'chibi_sprite' => 'ships/img/chibi/alabama.png',
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id' => '4',

        ]);

        DB::table('ships')->insert([
            'name' => 'Akagi',
            'hull_id' => '1',
            'notes' => 'Fast launch CV, very good for mobbing when paired with kaga',
            'faction_id' => '3',
            'position_id' => '3',
            'rarity_id' => '4',
            'sprite' => 'ships/img/sprite/akagi.png',
            'chibi_sprite' => 'ships/img/chibi/akagi.png',
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id' => '4',


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
            'heavy_id' => '4',

        ]);

        DB::table('ships')->insert([
            'name' => 'Akatsuki',
            'hull_id' => '7',
            'notes' => 'High firepower DD, good for clearing light armored enemies',
            'faction_id' => '2',
            'rarity_id' => '3',
            'position_id' => '1',
            'sprite' => 'ships/img/sprite/akatsuki.png',
            'chibi_sprite' => 'ships/img/chibi/akatsuki.png',
            'general_id' => '2',
            'light_id' => '3',
            'medium_id' => '4',
            'heavy_id' => '1',
        ]);

        DB::table('ships')->insert([
            'name' => 'Bismarck',
            'hull_id' => '5',
            'notes' => 'Strong battleship with good main battery',
            'faction_id' => '1',
            'rarity_id' => '5',
            'position_id' => '4',
            'sprite' => 'ships/img/sprite/bismarck.png',
            'chibi_sprite' => 'ships/img/chibi/bismarck.png',
            'general_id' => '4',
            'light_id' => '1',
            'medium_id' => '2',
            'heavy_id' => '3',
        ]);

        DB::table('ships')->insert([
            'name' => 'Cleveland',
            'hull_id' => '3',
            'notes' => 'Strong AA cruiser, good against planes',
            'faction_id' => '2',
            'rarity_id' => '3',
            'position_id' => '2',
            'sprite' => 'ships/img/sprite/cleveland.png',
            'chibi_sprite' => 'ships/img/chibi/cleveland.png',
            'general_id' => '3',
            'light_id' => '4',
            'medium_id' => '1',
            'heavy_id' => '2',
        ]);

        DB::table('ships')->insert([
            'name' => 'Enterprise',
            'hull_id' => '6',
            'notes' => 'Fast carrier with strong dive bombers',
            'faction_id' => '2',
            'rarity_id' => '5',
            'position_id' => '3',
            'sprite' => 'ships/img/sprite/enterprise.png',
            'chibi_sprite' => 'ships/img/chibi/enterprise.png',
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '4',
            'heavy_id' => '3',
        ]);

        DB::table('ships')->insert([
            'name' => '高雄 (Takao)',
            'hull_id' => '2',
            'notes' => 'Heavy cruiser with good armor and firepower',
            'faction_id' => '3',
            'rarity_id' => '4',
            'position_id' => '2',
            'sprite' => 'ships/img/sprite/takao.png',
            'chibi_sprite' => 'ships/img/chibi/takao.png',
            'general_id' => '3',
            'light_id' => '1',
            'medium_id' => '4',
            'heavy_id' => '2',
        ]);

        DB::table('ships')->insert([
            'name' => 'Prinz Eugen',
            'hull_id' => '5',
            'notes' => 'Well-rounded heavy cruiser with good AA',
            'faction_id' => '1',
            'rarity_id' => '4',
            'position_id' => '2',
            'sprite' => 'ships/img/sprite/prinz_eugen.png',
            'chibi_sprite' => 'ships/img/chibi/prinz_eugen.png',
            'general_id' => '4',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id' => '1',
        ]);

        DB::table('ships')->insert([
            'name' => 'Atago',
            'hull_id' => '2',
            'notes' => 'Heavy cruiser with strong torpedoes',
            'faction_id' => '3',
            'rarity_id' => '4',
            'position_id' => '2',
            'sprite' => 'ships/img/sprite/atago.png',
            'chibi_sprite' => 'ships/img/chibi/atago.png',
            'general_id' => '3',
            'light_id' => '4',
            'medium_id' => '2',
            'heavy_id' => '1',
        ]);

        DB::table('ships')->insert([
            'name' => 'Laffey',
            'hull_id' => '7',
            'notes' => 'Lucky destroyer with high evasion',
            'faction_id' => '2',
            'rarity_id' => '3',
            'position_id' => '1',
            'sprite' => 'ships/img/sprite/laffey.png',
            'chibi_sprite' => 'ships/img/chibi/laffey.png',
            'general_id' => '2',
            'light_id' => '4',
            'medium_id' => '1',
            'heavy_id' => '3',
        ]);

        DB::table('ships')->insert([
            'name' => 'Warspite',
            'hull_id' => '5',
            'notes' => 'Veteran battleship with strong main battery and secondary guns',
            'faction_id' => '1',
            'rarity_id' => '5',
            'position_id' => '4',
            'sprite' => 'ships/img/sprite/warspite.png',
            'chibi_sprite' => 'ships/img/chibi/warspite.png',
            'general_id' => '4',
            'light_id' => '3',
            'medium_id' => '2',
            'heavy_id' => '1',
        ]);

        DB::table('ships')->insert([
            'name' => 'Shokaku',
            'hull_id' => '6',
            'notes' => 'Balanced carrier with good fighter and bomber capabilities',
            'faction_id' => '3',
            'rarity_id' => '4',
            'position_id' => '3',
            'sprite' => 'ships/img/sprite/shokaku.png',
            'chibi_sprite' => 'ships/img/chibi/shokaku.png',
            'general_id' => '1',
            'light_id' => '4',
            'medium_id' => '2',
            'heavy_id' => '3',
        ]);

        DB::table('ships')->insert([
            'name' => 'Zuiho',
            'hull_id' => '6',
            'notes' => 'Light carrier focused on dive bombers',
            'faction_id' => '3',
            'rarity_id' => '3',
            'position_id' => '3',
            'sprite' => 'ships/img/sprite/zuiho.png',
            'chibi_sprite' => 'ships/img/chibi/zuiho.png',
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id' => '4',
        ]);

        DB::table('ships')->insert([
            'name' => 'Aoba',
            'hull_id' => '2',
            'notes' => 'Light cruiser with good AA and secondary guns',
            'faction_id' => '3',
            'rarity_id' => '2',
            'position_id' => '2',
            'sprite' => 'ships/img/sprite/aoba.png',
            'chibi_sprite' => 'ships/img/chibi/aoba.png',
            'general_id' => '3',
            'light_id' => '1',
            'medium_id' => '4',
            'heavy_id' => '2',
        ]);

        DB::table('ships')->insert([
            'name' => 'Maestrale',
            'hull_id' => '7',
            'notes' => 'Elite destroyer with high firepower',
            'faction_id' => '2',
            'rarity_id' => '4',
            'position_id' => '1',
            'sprite' => 'ships/img/sprite/maestrale.png',
            'chibi_sprite' => 'ships/img/chibi/maestrale.png',
            'general_id' => '2',
            'light_id' => '3',
            'medium_id' => '2',
            'heavy_id' => '1',
        ]);
    }
}
