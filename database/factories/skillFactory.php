<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class skillFactory extends Factory
{
    protected $model = Skill::class;


    public function definition()
    {
        $faker = Faker::create();

        return [
            'skill_name' => $faker->word(),
            'skill_img' => 'no-skill-pictures.png',
            'skill_priority' => random_int(1, 3),
        ];
    }
}
