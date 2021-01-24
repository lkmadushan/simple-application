<?php

namespace App\View\Components;

use App\Domain\Employee\Employee;
use Illuminate\Support\Collection;

class EmployeeForm extends BaseComponent
{
    /**
     * Countries.
     *
     * @var Collection
     */
    public $countries;

    /**
     * States.
     *
     * @var Collection
     */
    public $states;

    /**
     * Cities.
     *
     * @var Collection
     */
    public $cities;

    /**
     * BaseComponent constructor.
     *
     * @param Employee $employee
     * @param Collection $countries
     * @param Collection $states
     * @param Collection $cities
     */
    public function __construct(Employee $employee, Collection $countries, Collection $states, Collection $cities)
    {
        parent::__construct($employee);
        $this->countries = $countries;
        $this->states = $states;
        $this->cities = $cities;
    }
}
