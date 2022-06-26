<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PositionSeeder::class);
        $this->call(RaritySeeder::class);
        $this->call(HullSeeder::class);
        $this->call(FactionSeeder::class);
        $this->call(mobSeeder::class);
        $this->call(BossSeeder::class);
        $this->call(ShipsSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(SirenSeeder::class);
    }
}
