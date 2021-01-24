<?php

namespace App\Domain\City;

use App\Domain\BaseFilters;

class CityFilters extends BaseFilters
{
    public function stateId(string $stateId)
    {
        return $this->builder->where('state_id', $stateId);
    }
}
