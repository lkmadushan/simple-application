<?php

namespace App\Domain\Employee;

use App\Domain\BaseModel;
use App\Domain\City\City;
use App\Domain\Country\Country;
use App\Domain\Department\Department;
use App\Domain\State\State;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

class Employee extends BaseModel
{
    protected $fillable = [
        'country_id',
        'state_id',
        'city_id',
        'department_id',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'zip',
        'birthdate',
        'date_hired',
    ];

    /**
     * Country of the employee.
     *
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * State of the employee.
     *
     * @return BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * City of the employee.
     *
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Department of the employee.
     *
     * @return BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  Builder  $query
     *
     * @return EmployeeBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new EmployeeBuilder($query);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return EmployeeFactory::new();
    }
}
