<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Battleship Gun',
            'gear_category_slug'=>'battleship-gun',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Heavy Cruiser Gun',
            'gear_category_slug'=>'heavy-cruiser-gun',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Light Cruiser Gun',
            'gear_category_slug'=>'light-cruiser-gun',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Destroyer Gun',
            'gear_category_slug'=>'destroyer-gun',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Surface Torpedo',
            'gear_category_slug'=>'surface-torpedo',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Submarine Torpedo',
            'gear_category_slug'=>'submarine-torpedo',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Fighter',
            'gear_category_slug'=>'fighter',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Dive Bomber',
            'gear_category_slug'=>'dive-bomber',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Torpedo Bomber',
            'gear_category_slug'=>'torpedo-bomber',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Seaplane',
            'gear_category_slug'=>'seaplane',
        ]);
        DB::table('gear_categories')->insert([
            'gear_category_name'=>'AA Gun',
            'gear_category_slug'=>'aa-gun',
        ]);

        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Auxiliary Equipment',
            'gear_category_slug'=>'aux',
        ]);

        DB::table('gear_categories')->insert([
            'gear_category_name'=>'Augment',
            'gear_category_slug'=>'aug',
        ]);
    }
}
