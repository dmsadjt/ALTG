<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('archetypes')->insert([
            'archetype_name'=>'Timed Barrager',
            'archetype_slug'=>'timed_barrager',
        ]);

        DB::table('archetypes')->insert([
            'archetype_name'=>'Fast Launch',
            'archetype_slug'=>'fast_launch',
        ]);

        DB::table('archetypes')->insert([
            'archetype_name'=>'Buffer',
            'archetype_slug'=>'buffer',
        ]);
    }
}
