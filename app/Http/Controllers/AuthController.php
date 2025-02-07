<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthLoginResource;
use App\Services\AuthService;
use Knuckles\Scribe\Attributes\BodyParam;

class AuthController extends Controller
{
    #[BodyParam('mobile', 'string', 'User mobile.', required: true, example: '+1-111-111-111')]
    #[BodyParam('password', 'string', 'User password.', required: true, example: 'password')]
    public function login(LoginRequest $request, AuthService $authService): AuthLoginResource
    {
        $payload = $authService->login($request);

        return new AuthLoginResource($payload);
    }
}
