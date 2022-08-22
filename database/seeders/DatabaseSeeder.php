<?php

namespace Database\Seeders;

use App\Models\BossScore;
use App\Models\Gear;
use App\Models\MobScore;
use App\Models\Ship;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use RoleFactions;
use ShipPositions;
use ShipRoles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShipsSeeder::class);
        $this->call(mobSeeder::class);
        $this->call(BossSeeder::class);
        $this->call(ShipGear::class);
        $this->call(SkillSeeder::class);


        Ship::factory()->has(Skill::factory()->count(3), 'skill')->has(MobScore::factory(), 'mobScore')->has(BossScore::factory(), 'bossScore')->count(400)->create();
        // \App\Models\User::factory(10)->create();
        Gear::factory()->count(4)->create();

        $this->call(PositionSeeder::class);
        $this->call(RaritySeeder::class);
        $this->call(HullSeeder::class);
        $this->call(FactionSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(SirenSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostTagSeeder::class);
        $this->call(ArchetypeSeeder::class);
        $this->call(ShipArcSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ShipRoleSeeder::class);
        $this->call(ShipPositionSeeder::class);
        $this->call(GearSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RoleFactionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
