<?php

namespace App\Http\Controllers;

use App\Domain\City\City;
use App\Domain\Country\Country;
use App\Domain\Department\Department;
use App\Domain\Employee\Employee;
use App\Domain\State\State;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    /**
     * List all employees.
     *
     * @return View
     */
    public function index()
    {
        return view('employees.index');
    }

    /**
     * Show an employee.
     *
     * @param Employee $employee
     *
     * @return View
     */
    public function show(Employee $employee)
    {
        $departments = Department::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('employees.show', compact('employee', 'departments', 'countries', 'states', 'cities'));
    }

    /**
     * Show employee create form.
     *
     * @return View
     */
    public function create()
    {
        $departments = Department::all();
        $cities = City::all();

        return view('employees.create', compact('departments', 'countries', 'states', 'cities'));
    }

    /**
     * Create an employee.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = request()->validate([
            'first_name' => 'required|string|max:60',
            'middle_name' => 'required|string|max:6',
            'last_name' => 'required|string|max:60',
            'city_id' => ['required', Rule::exists('cities', 'id')],
            'state_id' => ['required', Rule::exists('states', 'id')],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'address' => 'required|string|120',
            'zip' => 'required|string|min:10|max:10',
            'birthdate' => 'nullable|date',
            'date_hired' => 'nullable|date',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index');
    }

    /**
     * Update an employee.
     *
     * @param Employee $employee
     *
     * @return RedirectResponse
     */
    public function update(Employee $employee)
    {
        $validated = request()->validate([
            'first_name' => 'required|string|max:60',
            'middle_name' => 'required|string|max:6',
            'last_name' => 'required|string|max:60',
            'city_id' => ['required', Rule::exists('cities', 'id')],
            'state_id' => ['required', Rule::exists('states', 'id')],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'address' => 'required|string|120',
            'zip' => 'required|string|min:10|max:10',
            'birthdate' => 'nullable|date',
            'date_hired' => 'nullable|date',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index');
    }

    /**
     * Delete an employee.
     *
     * @param Employee $employee
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
