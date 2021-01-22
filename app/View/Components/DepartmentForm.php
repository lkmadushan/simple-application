<?php

namespace App\View\Components;

use App\Models\Department;
use Illuminate\View\Component;

class DepartmentForm extends Component
{
    /**
     * Department.
     *
     * @var Department|null
     */
    public $department;

    /**
     * Create a new component instance.
     *
     * @param Department|null $department
     */
    public function __construct(?Department $department = null)
    {
        $this->department = $department;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.department-form');
    }

    /**
     * Form action.
     *
     * @return string
     */
    public function action()
    {
        if (! $this->department->exists) {
            return route('departments.store');
        }

        return route('departments.update', $this->department->id);
    }

    /**
     * Form method.
     *
     * @return string
     */
    public function method()
    {
        if (! $this->department->exists) {
            return 'POST';
        }

        return 'PUT';
    }
}
