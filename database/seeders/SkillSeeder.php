<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'ship_id'=>'1',
            'skill_name'=>'Kemarau',
            'skill_priority'=>'1',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'1',
            'skill_name'=>'Hujan',
            'skill_priority'=>'2',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'1',
            'skill_name'=>'Salju',
            'skill_priority'=>'3',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'2',
            'skill_name'=>'Gugur',
            'skill_priority'=>'3',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'2',
            'skill_name'=>'Semi',
            'skill_priority'=>'2',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'2',
            'skill_name'=>'Hujans',
            'skill_priority'=>'2',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'3',
            'skill_name'=>'Bola',
            'skill_priority'=>'2',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'3',
            'skill_name'=>'Pilot',
            'skill_priority'=>'3',
        ]);

        DB::table('skills')->insert([
            'ship_id'=>'3',
            'skill_name'=>'Tidur',
            'skill_priority'=>'1',
        ]);

    }
}
