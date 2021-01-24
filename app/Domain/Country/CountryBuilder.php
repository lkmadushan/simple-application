<?php

namespace App\Domain\Country;

use Illuminate\Database\Eloquent\Builder;

class CountryBuilder extends Builder
{
    /**
     * Query countries by name and country code for search string.
     *
     * @param string $search
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function search(string $search = null)
    {
        return $this->when($search, function ($query) use ($search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', $search.'%');
                $query->orWhere('country_code', 'like', $search.'%');
            });
        });
    }
}
