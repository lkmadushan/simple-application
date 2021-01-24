<?php

namespace App\Http\Controllers\API;

use App\Domain\User\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUsersController extends Controller
{
    /**
     * Register a user.
     *
     * @return JsonResponse
     */
    public function __invoke()
    {
        $validated = request()->validate([
            'username' => ['required', 'string', 'max:20'],
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ]);

        try {
            DB::beginTransaction();

            event(new Registered($user = User::create(array_merge($validated, [
                'password' => Hash::make($validated['password']),
            ]))));

            $tokenResult = $user->createToken('Personal Access Token');

            DB::commit();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
