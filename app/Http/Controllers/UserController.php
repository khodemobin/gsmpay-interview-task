<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(UserService $userService): AnonymousResourceCollection
    {
        $users = $userService->index();

        return UserResource::collection($users);
    }

    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function update(UpdateRequest $request, UserService $userService): UserResource
    {
        $user = $userService->update($request, $request->user());

        return new UserResource($user);
    }
}
