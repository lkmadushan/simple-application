<?php

namespace App\Domain\Department;

use Illuminate\Database\Eloquent\Builder;

class DepartmentBuilder extends Builder
{
    /**
     * Query departments by name for search string.
     *
     * @param string|null $search
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function search(string $search = null)
    {
        return $this->when($search, function ($query) use ($search) {
            return $query->where('name', 'like', $search.'%');
        });
    }
}
