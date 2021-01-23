<?php

namespace Database\Factories;

use App\Domain\City\City;
use App\Domain\Country\Country;
use App\Domain\Department\Department;
use App\Domain\Employee\Employee;
use App\Domain\State\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->lexify('??????'),
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'city_id' => City::factory(),
            'state_id' => function ($attributes) {
                return State::whereIn(
                    'id',
                    City::where('id', $attributes['city_id'])->select('state_id'),
                )->first();
            },
            'country_id' => function ($attributes) {
                return Country::whereIn(
                    'id',
                    State::whereIn(
                        'id',
                        City::where('id', $attributes['city_id'])->select('state_id')
                    )->select('country_id')
                )->first();
            },
            'department_id' => Department::factory(),
            'address' => $this->faker->address,
            'zip' => $this->faker->postcode,
            'birthdate' => now(),
            'date_hired' => now(),
        ];
    }
}
