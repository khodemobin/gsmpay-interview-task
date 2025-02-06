<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthLoginResource;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $auth): AuthLoginResource
    {
        $payload = $auth->login($request);

        return new AuthLoginResource($payload);
    }
}
