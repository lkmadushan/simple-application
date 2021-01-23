<?php

namespace App\Domain\Country;

use App\Domain\BaseModel;
use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Query\Builder;

class Country extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'country_code',
    ];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  Builder  $query
     *
     * @return CountryBuilder|static
     */
    public function newEloquentBuilder($query)
    {
        return new CountryBuilder($query);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return CountryFactory::new();
    }
}
