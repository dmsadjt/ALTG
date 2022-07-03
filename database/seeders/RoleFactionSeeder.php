<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleFactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_factions')->insert([
            'role_id'=>'1',
            'faction_id'=>'1',
        ]);

        DB::table('roles_factions')->insert([
            'role_id'=>'1',
            'faction_id'=>'2',
        ]);

        DB::table('roles_factions')->insert([
            'role_id'=>'1',
            'faction_id'=>'3',
        ]);

        DB::table('roles_factions')->insert([
            'role_id'=>'1',
            'faction_id'=>'4',
        ]);

        DB::table('roles_factions')->insert([
            'role_id'=>'1',
            'faction_id'=>'5',
        ]);
    }
}
