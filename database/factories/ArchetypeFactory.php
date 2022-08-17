<?php

namespace Database\Factories;

use App\Models\Archetype;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArchetypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Archetype::class;

    public function definition()
    {

        $faker = Faker::create();
        $name = $faker->word();

        return [
            'archetype_name'=>$name,
            'archetype_slug'=>$name,
        ];
    }
}
