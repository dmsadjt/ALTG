<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'tag_label' => 'Patch',
            'tag_slug'  => 'patch',
        ]);
        DB::table('tags')->insert([
            'tag_label' => 'Character Banner',
            'tag_slug'  => 'banner',
        ]);
        DB::table('tags')->insert([
            'tag_label' => 'Tier List Update',
            'tag_slug'  => 'update',
        ]);
    }
}
