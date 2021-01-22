<?php

namespace App\View\Components;

use App\Models\State;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class StateForm extends Component
{
    /**
     * Country.
     *
     * @var State|null
     */
    public $state;

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
    public function __construct(Collection $countries, ?State $state = null)
    {
        $this->state = $state;
        $this->countries = $countries;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.state-form');
    }

    /**
     * Form action.
     *
     * @return string
     */
    public function action()
    {
        if (! $this->state->exists) {
            return route('states.store');
        }

        return route('states.update', $this->state->id);
    }

    /**
     * Form method.
     *
     * @return string
     */
    public function method()
    {
        if (! $this->state->exists) {
            return 'POST';
        }

        return 'PUT';
    }
}
