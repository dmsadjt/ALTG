<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Gear;

class gearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Gear::class;
    public function definition()
    {

        $faker = Faker::create();

        return [
            'gear_name' => $faker->word(),
            'gear_img' => 'gear/img/no-pictures.png',
            'gear_rarity' => $faker->randomElement(['n', 'r', 'e', 'sr', 'ur']),
            'gear_type' => random_int(1, 13),
        ];
    }
}
