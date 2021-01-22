<?php

namespace App\View\Components;

use App\Models\Country;
use Illuminate\View\Component;

class CountryForm extends Component
{
    /**
     * Country.
     *
     * @var Country|null
     */
    public $country;

    /**
     * Create a new component instance.
     *
     * @param Country|null $country
     */
    public function __construct(?Country $country = null)
    {
        $this->country = $country;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.country-form');
    }

    /**
     * Form action.
     *
     * @return string
     */
    public function action()
    {
        if (! $this->country->exists) {
            return route('countries.store');
        }

        return route('countries.update', $this->country->id);
    }

    /**
     * Form method.
     *
     * @return string
     */
    public function method()
    {
        if (! $this->country->exists) {
            return 'POST';
        }

        return 'PUT';
    }
}
