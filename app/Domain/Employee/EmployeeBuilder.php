<?php

namespace App\Domain\Employee;

use App\Domain\Department\Department;
use Illuminate\Database\Eloquent\Builder;

class EmployeeBuilder extends Builder
{
    /**
     * Search employees with search string.
     *
     * @param string|null $search
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function search(string $search = null)
    {
        return $this->when($search, function ($query) use ($search) {
            return $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', $search.'%');
                $query->orWhere('middle_name', 'like', $search.'%');
                $query->orWhere('last_name', 'like', $search.'%');
                $query->orWhereIn(
                    'department_id',
                    Department::select('id')->where('name', 'like', $search.'%')
                );
            });
        });
    }
}
