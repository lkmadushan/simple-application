<?php

namespace App\Http\Controllers;

use App\Domain\City\City;
use App\Domain\State\State;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class CitiesController extends Controller
{
    /**
     * List all cities.
     *
     * @return View
     */
    public function index()
    {
        return view('cities.index', [
            'cities' => City::query()
                ->with('state.country')
                ->search(request('search'))
                ->get(),
        ]);
    }

    /**
     * Show a city.
     *
     * @param City $city
     *
     * @return View
     */
    public function show(City $city)
    {
        $states = State::all();

        return view('cities.show', compact('city', 'states'));
    }

    /**
     * Show city create form.
     *
     * @return View
     */
    public function create()
    {
        $states = State::all();

        return view('cities.create', compact('states'));
    }

    /**
     * Create a city.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:60',
            'state_id' => ['required', Rule::exists('states', 'id')],
        ]);

        City::create($validated);

        return redirect()->route('cities.index');
    }

    /**
     * Update a city.
     *
     * @param City $city
     *
     * @return RedirectResponse
     */
    public function update(City $city)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:60',
            'state_id' => ['required', Rule::exists('states', 'id')],
        ]);

        $city->update($validated);

        return redirect()->route('cities.index');
    }

    /**
     * Delete a city.
     *
     * @param City $city
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index');
    }
}
