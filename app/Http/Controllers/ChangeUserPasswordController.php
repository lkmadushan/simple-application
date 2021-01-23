<?php

namespace App\Http\Controllers;

use App\Domain\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class ChangeUserPasswordController extends Controller
{
    /**
     * Update users password.
     *
     * @param User $user
     *
     * @return RedirectResponse
     */
    public function __invoke(User $user)
    {
        $validated = request()->validate([
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('users.index');
    }
}
