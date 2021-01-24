<?php

namespace App\View\Components;

use App\Domain\City\City;
use Illuminate\Support\Collection;

class CityForm extends BaseComponent
{
    /**
     * @var Collection
     */
    public $states;

    /**
     * Create a new component instance.
     *
     * @param City $city
     * @param Collection $states
     */
    public function __construct(City $city, Collection $states)
    {
        parent::__construct($city);
        $this->states = $states;
    }
}
