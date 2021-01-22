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
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @param Department|null $department
     * @param string $message
     */
    public function __construct(?Department $department = null, string $message = null)
    {
        $this->department = $department;
        $this->message = $message;
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
    public function formActionRoute()
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
    public function formMethod()
    {
        if (! $this->department->exists) {
            return 'POST';
        }

        return 'PUT';
    }
}
