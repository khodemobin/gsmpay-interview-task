<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * @throws \Throwable
     */
    public function login(LoginRequest $request): array
    {
        $user = User::query()->where('mobile', $request->input('mobile'))->first();
        throw_if(! $user, ValidationException::withMessages([
            'mobile' => __('auth.failed'),
        ]));

        if (! Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'mobile' => __('auth.failed'),
            ]);
        }

        $token = $user->createToken('login')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}
