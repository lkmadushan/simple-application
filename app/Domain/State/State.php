<?php

namespace App\Domain\State;

use App\Domain\BaseModel;
use App\Domain\Country\Country;
use Database\Factories\StateFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

class State extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country_id',
        'name',
    ];

    /**
     * Country of the status.
     *
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  Builder  $query
     *
     * @return StateBuilder|static
     */
    public function newEloquentBuilder($query)
    {
        return new StateBuilder($query);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return StateFactory::new();
    }
}
