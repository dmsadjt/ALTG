<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ship_roles')->insert([
            'ship_id'=>'1',
            'role_id'=>'1',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'1',
            'role_id'=>'2',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'1',
            'role_id'=>'3',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'1',
            'role_id'=>'4',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'1',
            'role_id'=>'5',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'2',
            'role_id'=>'3',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'2',
            'role_id'=>'5',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'3',
            'role_id'=>'4',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'3',
            'role_id'=>'1',
        ]);

        DB::table('ship_roles')->insert([
            'ship_id'=>'3',
            'role_id'=>'2',
        ]);

    }
}
