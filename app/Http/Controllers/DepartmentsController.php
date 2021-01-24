<?php

namespace App\Http\Controllers;

use App\Domain\Department\Department;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DepartmentsController extends Controller
{
    /**
     * List all departments.
     *
     * @return View
     */
    public function index()
    {
        return view('departments.index', [
            'departments' => Department::query()
                ->search(request('search'))
                ->get(),
        ]);
    }

    /**
     * Show a department.
     *
     * @param Department $department
     *
     * @return View
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Show department create form.
     *
     * @return View
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Create a department.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:60',
        ]);

        Department::create($validated);

        return redirect()->route('departments.index');
    }

    /**
     * Update a department.
     *
     * @param Department $department
     *
     * @return RedirectResponse
     */
    public function update(Department $department)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:60',
        ]);

        $department->update($validated);

        return redirect()->route('departments.index');
    }

    /**
     * Delete a department.
     *
     * @param Department $department
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index');
    }
}
