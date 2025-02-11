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
            'name' => $faker->name(),
            'hull_id' => random_int(1, 8),
            'notes' => $faker->sentence(),
            'faction_id' => random_int(1, 9),
            'rarity_id' => random_int(1, 5),
            'position_id' => $faker->randomDigitNot(0),
            'general_id' => '1',
            'light_id' => '2',
            'medium_id' => '3',
            'heavy_id' => '4',
            'sprite' => 'ships/img/sprite/no-sprite.png',
            'chibi_sprite' => 'ships/img/chibi/no-sprite.png',
        ];
    }
}
