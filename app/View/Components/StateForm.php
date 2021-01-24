<?php

namespace App\View\Components;

use App\Domain\State\State;
use Illuminate\Support\Collection;

class StateForm extends BaseComponent
{
    /**
     * Countries.
     *
     * @var Collection
     */
    public $countries;

    /**
     * Create a new component instance.
     *
     * @param Collection $countries
     * @param State|null $state
     */
    public function __construct(State $state, Collection $countries)
    {
        parent::__construct($state);
        $this->countries = $countries;
    }
}
