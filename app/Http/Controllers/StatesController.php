<?php

namespace App\Http\Controllers;

use App\Domain\Country\Country;
use App\Domain\State\State;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class StatesController extends Controller
{
    /**
     * List all states.
     *
     * @return View
     */
    public function index()
    {
        return view('states.index', [
            'states' => State::query()
                ->with('country')
                ->search(request('search'))
                ->get(),
        ]);
    }

    /**
     * Show a state.
     *
     * @param State $state
     *
     * @return View
     */
    public function show(State $state)
    {
        $countries = Country::all();

        return view('states.show', compact('state', 'countries'));
    }

    /**
     * Show state create form.
     *
     * @return View
     */
    public function create()
    {
        $countries = Country::all();

        return view('states.create', compact('countries'));
    }

    /**
     * Create a country.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:60',
            'country_id' => ['required', Rule::exists('countries', 'id')],
        ]);

        State::create($validated);

        return redirect()->route('states.index');
    }

    /**
     * Update a state.
     *
     * @param State $state
     *
     * @return RedirectResponse
     */
    public function update(State $state)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:60',
            'country_id' => ['required', Rule::exists('countries', 'id')],
        ]);

        $state->update($validated);

        return redirect()->route('states.index');
    }

    /**
     * Delete a state.
     *
     * @param State $state
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index');
    }
}
