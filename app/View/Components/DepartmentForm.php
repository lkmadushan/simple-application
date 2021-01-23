<?php

namespace App\View\Components;

use App\Domain\Department\Department;

class DepartmentForm extends BaseComponent
{
    /**
     * Create a new component instance.
     *
     * @param Department|null $department
     */
    public function __construct(Department $department)
    {
        parent::__construct($department);
    }
}
