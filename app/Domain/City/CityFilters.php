<?php

namespace App\Domain\City;

use App\Domain\BaseFilters;

class CityFilters extends BaseFilters
{
    /**
     * Filter city by state.
     *
     * @param string $stateId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function stateId(string $stateId)
    {
        return $this->builder->where('state_id', $stateId);
    }
}
