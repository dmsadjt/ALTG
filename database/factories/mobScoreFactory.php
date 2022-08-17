<?php

namespace Database\Factories;

use App\Models\MobScore;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class mobScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = MobScore::class;
    public function definition()
    {
        $faker = Faker::create();


        return [
            'mob_9_11'=>$faker->randomDigit(),
            'mob_12_13'=>$faker->randomDigit(),
            'mob_14'=>$faker->randomDigit(),
        ];
    }
}
