<?php

namespace App\Department;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return DepartmentFactory::new();
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  Builder  $query
     *
     * @return DepartmentBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new DepartmentBuilder($query);
    }
}
