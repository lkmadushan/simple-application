<?php

namespace App\Http\Controllers;

use App\Domain\Role\Role;
use App\Domain\User\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Show user list.
     *
     * @return View
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::with('role')
                ->search(request('search'))
                ->get(),
        ]);
    }

    /**
     * Show suer create form.
     *
     * @return View
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Create a new user.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = request()->validate([
            'username' => ['required', 'string', 'max:20'],
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:255',  'confirmed'],
        ]);

        User::create(array_merge($validated, [
            'password' => Hash::make($validated['password']),
        ]));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $roles = Role::all();

        return view('users.show', compact('user', 'roles'));
    }

    /**
     * Create a new user.
     *
     * @param User $user
     *
     * @return RedirectResponse
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'username' => ['required', 'string', 'max:20'],
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update($validated);

        return redirect()->route('users.index');
    }

    /**
     * Delete a user.
     *
     * @param User $user
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
