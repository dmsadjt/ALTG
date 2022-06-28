<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name'=>'DPS',
            'role_slug'=>'dps',
        ]);

        DB::table('roles')->insert([
            'role_name'=>'Sub-DPS',
            'role_slug'=>'subdps',
        ]);

        DB::table('roles')->insert([
            'role_name'=>'Healer',
            'role_slug'=>'healer',
        ]);

        DB::table('roles')->insert([
            'role_name'=>'Support',
            'role_slug'=>'support',
        ]);

        DB::table('roles')->insert([
            'role_name'=>'Shielder',
            'role_slug'=>'shielder',
        ]);
    }
}
