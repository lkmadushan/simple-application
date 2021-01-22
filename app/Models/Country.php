<?php

namespace App\Models;

use App\Builders\CountryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;

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
     * @return CountryBuilder|static
     */
    public function newEloquentBuilder($query)
    {
        return new CountryBuilder($query);
    }
}
