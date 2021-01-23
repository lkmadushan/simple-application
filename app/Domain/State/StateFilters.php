<?php

namespace App\Domain\State;

use App\Domain\BaseFilters;

class StateFilters extends BaseFilters
{
    /**
     * Query states by country id.
     *
     * @param string $countryId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function countryId(string $countryId)
    {
        return $this->builder->where('country_id', $countryId);
    }
}
