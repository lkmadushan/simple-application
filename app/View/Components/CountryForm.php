<?php

namespace App\View\Components;

use App\Domain\Country\Country;

class CountryForm extends BaseComponent
{
    /**
     * Create a new component instance.
     *
     * @param Country|null $country
     */
    public function __construct(Country $country)
    {
        parent::__construct($country);
    }
}
