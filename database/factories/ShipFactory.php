<?php

namespace Database\Factories;

use App\Models\Ship;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class ShipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Ship::class;

    public function definition()
    {
        $faker = Faker::create();

        return [
            'name'=>$faker->name(),
            'hull_id'=>random_int(1,9),
            'notes'=>$faker->sentence(),
            'faction_id'=>random_int(1,9),
            'rarity_id'=>random_int(1,5),
            'position_id'=>$faker->randomDigitNot(0),
            'template_id'=>'1',
            'sprite'=>'no-sprite.png',
            'chibi_sprite'=>'no-sprite.png',

        ];
    }
}
