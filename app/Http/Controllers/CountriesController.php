<?php

namespace App\Http\Controllers;

use App\Domain\Country\Country;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CountriesController extends Controller
{
    /**
     * List all countries.
     *
     * @return View
     */
    public function index()
    {
        return view('countries.index', [
            'countries' => Country::query()
                ->search(request('search'))
                ->get(),
        ]);
    }

    /**
     * Show a country.
     *
     * @param Country $country
     *
     * @return View
     */
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    /**
     * Show country create form.
     *
     * @return View
     */
    public function create()
    {
        return view('countries.create');
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
            'country_code' => 'required|string|max:3',
        ]);

        Country::create($validated);

        return redirect()->route('countries.index');
    }

    /**
     * Update a country.
     *
     * @param Country $country
     *
     * @return RedirectResponse
     */
    public function update(Country $country)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:60',
            'country_code' => 'required|string|max:3',
        ]);

        $country->update($validated);

        return redirect()->route('countries.index');
    }

    /**
     * Delete a country.
     *
     * @param Country $country
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index');
    }
}
