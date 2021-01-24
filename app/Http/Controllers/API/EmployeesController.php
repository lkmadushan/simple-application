<?php

namespace App\Http\Controllers\API;

use App\Domain\Employee\Employee;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    /**
     * List employees.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(
            Employee::with(['department', 'city.state.country'])
                ->orderBy('last_name')
                ->search(request('search'))
                ->get()
        );
    }

    /**
     * Create an employee.
     *
     * @return Response
     */
    public function store()
    {
        $validated = request()->validate([
            'first_name' => 'required|string|max:6',
            'middle_name' => 'nullable|string|max:60',
            'last_name' => 'required|string|max:60',
            'city_id' => ['required', Rule::exists('cities', 'id')],
            'state_id' => ['required', Rule::exists('states', 'id')],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'address' => 'required|string|max:120',
            'zip' => 'required|string|max:10',
            'birthdate' => 'nullable|date',
            'date_hired' => 'nullable|date',
        ]);

        Employee::create($validated);

        return response()->noContent();
    }

    /**
     * Update an employee.
     *
     * @param Employee $employee
     *
     * @return Response
     */
    public function update(Employee $employee)
    {
        $validated = request()->validate([
            'first_name' => 'required|string|max:6',
            'middle_name' => 'nullable|string|max:60',
            'last_name' => 'required|string|max:60',
            'city_id' => ['required', Rule::exists('cities', 'id')],
            'state_id' => ['required', Rule::exists('states', 'id')],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'address' => 'required|string|max:120',
            'zip' => 'required|string|max:10',
            'birthdate' => 'nullable|date',
            'date_hired' => 'nullable|date',
        ]);

        $employee->update($validated);

        return response()->noContent();
    }

    /**
     * Delete an employee.
     *
     * @param Employee $employee
     *
     * @throws Exception
     *
     * @return Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->noContent();
    }
}
