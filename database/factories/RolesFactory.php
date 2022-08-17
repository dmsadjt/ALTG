<?php

namespace Database\Factories;

use App\Models\Roles;
use App\Models\Faction;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Roles::class;
    public function definition()
    {
        $faker = Faker::create();
        $name = $faker->word();
        return [
            'role_name'=> $name,
            'role_slug'=> $name,
        ];
    }
}
