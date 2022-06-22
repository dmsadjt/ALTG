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
            'roles'=>'Buffer',
            'position_id'=>'9',
            'notes'=>'Torp CL that buff DD torp',
            'faction'=>'1',
            'rarity_id'=>'1',
            'mob_911'=>'4',
            'mob_1213'=>'4',
            'mob_14'=>'3',
            'boss_911'=>'3',
            'boss_1213'=>'3',
            'boss_14'=>'2',
        ]);
    }
}
