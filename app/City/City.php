<?php

namespace App\City;

use App\State\State;
use Database\Factories\CityFactory;
use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class City extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'state_id',
        'name',
    ];

    /**
     * State of the city.
     *
     * @return BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  Builder  $query
     *
     * @return CityBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new CityBuilder($query);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return CityFactory::new();
    }
}
