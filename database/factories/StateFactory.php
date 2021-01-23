<?php

namespace Database\Factories;

use App\Country\Country;
use App\State\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => Country::factory(),
            'name' => $this->faker->state,
        ];
    }
}
