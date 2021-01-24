<?php

namespace Database\Seeders;

use App\Domain\Country\Country;

class CountrySeeder extends DatabaseSeeder
{
    /**
     * Seed the countries table.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()
            ->count(4)
            ->create();
    }
}
