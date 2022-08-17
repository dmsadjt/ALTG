<?php

namespace Database\Factories;

use App\Models\BossScore;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class bossScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = BossScore::class;
    public function definition()
    {
        $faker=Faker::create();

        return [
            'boss_9_11'=>$faker->randomDigit(),
            'boss_12_13'=>$faker->randomDigit(),
            'boss_14'=>$faker->randomDigit(),
        ];
    }
}
