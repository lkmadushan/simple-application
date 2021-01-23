<?php

namespace App\Domain\City;

use App\Domain\Country\Country;
use App\Domain\State\State;
use Illuminate\Database\Eloquent\Builder;

class CityBuilder extends Builder
{
    /**
     * Query cities by name, state name and country name for search string.
     *
     * @param string|null $search
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function search(string $search = null)
    {
        return $this->when($search, function ($query) use ($search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', $search.'%');
                $query->orWhereIn(
                    'state_id',
                    State::where(function ($query) use ($search) {
                        $query->where('name', 'like', $search.'%');
                        $query->orWhereIn(
                            'country_id',
                            Country::where('name', 'like', $search.'%')->select('id')
                        );
                    })->select('id')
                );
            });
        });
    }
}
