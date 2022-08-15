<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShipGear extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gear_template')->insert([
            'template_id'=>'1',
            'gear_id'=>'1',
            'gear_category'=>'General',
        ]);

        DB::table('gear_template')->insert([
            'template_id'=>'1',
            'gear_id'=>'2',
            'gear_category'=>'General',
        ]);

        DB::table('gear_template')->insert([
            'template_id'=>'1',
            'gear_id'=>'3',
            'gear_category'=>'General',
        ]);

        DB::table('gear_template')->insert([
            'template_id'=>'1',
            'gear_id'=>'4',
            'gear_category'=>'General',
        ]);

        DB::table('gear_template')->insert([
            'template_id'=>'1',
            'gear_id'=>'5',
            'gear_category'=>'General',
        ]);

        DB::table('gear_template')->insert([
            'template_id'=>'1',
            'gear_id'=>'6',
            'gear_category'=>'General',
        ]);
    }
}
