<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SirenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //stronghold


        DB::table('sirens')->insert([
            'name' => 'Stronghold-None-1',
            'boss_type' => 'stronghold',
            'adaptability' => 'none',
        ]);


        DB::table('sirens')->insert([
            'name' => 'Stronghold-Full-1',
            'boss_type' => 'stronghold',
            'adaptability' => 'full',
        ]);

        //abyssal
        DB::table('sirens')->insert([
            'name' => 'Abyssal-None-1',
            'boss_type' => 'abyssal',
            'adaptability' => 'none',
        ]);


        DB::table('sirens')->insert([
            'name' => 'Abyssal-Full-1',
            'boss_type' => 'abyssal',
            'adaptability' => 'full',
        ]);


        //Arbiter none
        DB::table('sirens')->insert([
            'name' => 'Arbiter-none-1',
            'boss_type' => 'arbiter',
            'adaptability' => 'none',
        ]);

        //Arbiter full
        DB::table('sirens')->insert([
            'name' => 'Arbiter-full-1',
            'boss_type' => 'arbiter',
            'adaptability' => 'full',
        ]);


        //Guild Boss
        DB::table('sirens')->insert([
            'name' => 'Guild Boss',
            'boss_type' => 'guild',
        ]);


        //Meta Boss
        DB::table('sirens')->insert([
            'name' => 'Meta Boss 1',
            'boss_type' => 'meta',
        ]);

        DB::table('sirens')->insert([
            'name' => 'Meta Boss 2',
            'boss_type' => 'meta',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '1',
            'hull_id' => '1',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '2',
            'hull_id' => '2',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '3',
            'hull_id' => '3',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '4',
            'hull_id' => '4',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '5',
            'hull_id' => '5',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('hards')->insert([
            'siren_id' => '5',
            'hull_id' => '5',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '6',
            'hull_id' => '5',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('hards')->insert([
            'siren_id' => '6',
            'hull_id' => '5',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '7',
            'hull_id' => '5',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '8',
            'hull_id' => '5',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '9',
            'hull_id' => '5',
            'level' => '100',
            'armor' => 'Medium',
            'hp' => '400k',
            'fp' => '100',
            'trp' => '100',
            'aa' => '100',
            'avi' => '100',
            'acc' => '100',
            'eva' => '100',
            'lck' => '100',
            'spd' => '100',
        ]);
    }
}
