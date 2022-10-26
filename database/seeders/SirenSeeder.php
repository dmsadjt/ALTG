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
            'name' => 'Stronghold-1',
            'boss_type' => 'stronghold',
            'adaptability' => 'none',
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

        DB::table('full_normals')->insert([
            'siren_id' => '1',
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

        //abyssal
        DB::table('sirens')->insert([
            'name' => 'Abyssal-1',
            'boss_type' => 'abyssal',
            'adaptability' => 'none',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '2',
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

        DB::table('full_normals')->insert([
            'siren_id' => '2',
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

        //Arbiter none
        DB::table('sirens')->insert([
            'name' => 'Arbiter-1',
            'boss_type' => 'arbiter',
            'adaptability' => 'none',
        ]);

        DB::table('normals')->insert([
            'siren_id' => '3',
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

        DB::table('full_normals')->insert([
            'siren_id' => '3',
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

        DB::table('hards')->insert([
            'siren_id' => '3',
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

        DB::table('full_hards')->insert([
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

        //Guild Boss
        DB::table('sirens')->insert([
            'name' => 'Guild Boss',
            'boss_type' => 'guild',
        ]);


        DB::table('normals')->insert([
            'siren_id' => '4',
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
            'siren_id' => '5',
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
            'siren_id' => '6',
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
    }
}
