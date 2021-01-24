<?php

namespace App\Domain\State;

use App\Domain\Country\Country;
use Illuminate\Database\Eloquent\Builder;

class StateBuilder extends Builder
{
    /**
     * Query states by name and country name for search string.
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
                    'country_id',
                    Country::where('name', 'like', $search.'%')->select('id')
                );
            });
        });
    }
}
