<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthLoginResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $authService): AuthLoginResource
    {
        $payload = $authService->login($request);

        return new AuthLoginResource($payload);
    }
}
