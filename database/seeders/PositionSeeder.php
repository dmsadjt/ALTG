<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'position_name'=>'Any',
            'position_category'=>'backline',
            'position_type'=>'single',
            'position_image'=>'backline-any.png',
            'position_slug'=>'backline-any',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Flagship',
            'position_category'=>'backline',
            'position_type'=>'single',
            'position_image'=>'backline-flagship.png',
            'position_slug'=>'backline-flagship',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Off Flag',
            'position_category'=>'backline',
            'position_type'=>'single',
            'position_image'=>'backline-off_flag.png',
            'position_slug'=>'backline-off_flag',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'All',
            'position_category'=>'submarine',
            'position_type'=>'composite',
            'position_image'=>'submarine-all.png',
            'position_slug'=>'submarine-all',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Flagship',
            'position_category'=>'submarine',
            'position_type'=>'single',
            'position_image'=>'submarine-flagship.png',
            'position_slug'=>'submarine-flagship',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Off Flag',
            'position_category'=>'submarine',
            'position_type'=>'single',
            'position_image'=>'submarine-off_flag.png',
            'position_slug'=>'submarine-off_flag',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Any',
            'position_category'=>'vanguard',
            'position_type'=>'single',
            'position_image'=>'vanguard-any.png',
            'position_slug'=>'vanguard-any',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Mid, Off tank',
            'position_category'=>'vanguard',
            'position_type'=>'composite',
            'position_image'=>'vanguard-mid-offtank.png',
            'position_slug'=>'vanguard-mid-offtank',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Mid',
            'position_category'=>'vanguard',
            'position_type'=>'single',
            'position_image'=>'vanguard-mid.png',
            'position_slug'=>'vanguard-mid',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Off tank',
            'position_category'=>'vanguard',
            'position_type'=>'single',
            'position_image'=>'vanguard-offtank.png',
            'position_slug'=>'vanguard-offtank',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Tank, Mid',
            'position_category'=>'vanguard',
            'position_type'=>'composite',
            'position_image'=>'vanguard-tank-mid.png',
            'position_slug'=>'vanguard-tank-mid',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Tank, Off tank',
            'position_category'=>'vanguard',
            'position_type'=>'composite',
            'position_image'=>'vanguard-tank-off_tank.png',
            'position_slug'=>'vanguard-tank-off_tank',
        ]);

        DB::table('positions')->insert([
            'position_name'=>'Tank',
            'position_category'=>'vanguard',
            'position_type'=>'single',
            'position_image'=>'vanguard-tank.png',
            'position_slug'=>'vanguard-tank',
        ]);



        DB::table('position_children')->insert([
            'position_name'=>'Flagship',
            'position_category'=>'submarine',
            'position_slug'=>'submarine-flagship',
            'position_image'=>'submarine-flagship.png',
        ]);

        DB::table('position_children')->insert([
            'position_name'=>'Off Flag',
            'position_category'=>'submarine',
            'position_slug'=>'submarine-off_flag',
            'position_image'=>'submarine-off_flag.png',
        ]);

        DB::table('position_children')->insert([
            'position_name'=>'Mid',
            'position_category'=>'vanguard',
            'position_slug'=>'vanguard-mid',
            'position_image'=>'vanguard-mid.png',
        ]);

        DB::table('position_children')->insert([
            'position_name'=>'Off Tank',
            'position_category'=>'vanguard',
            'position_slug'=>'vanguard-offtank',
            'position_image'=>'vanguard-offtank.png',
        ]);

        DB::table('position_children')->insert([
            'position_name'=>'Tank',
            'position_category'=>'vanguard',
            'position_slug'=>'vanguard-tank',
            'position_image'=>'vanguard-tank.png',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'4',
            'children_id'=>'1',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'4',
            'children_id'=>'2',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'8',
            'children_id'=>'3',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'8',
            'children_id'=>'4',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'11',
            'children_id'=>'5',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'11',
            'children_id'=>'3',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'12',
            'children_id'=>'5',
        ]);

        DB::table('position_position')->insert([
            'position_id'=>'12',
            'children_id'=>'4',
        ]);
    }
}
