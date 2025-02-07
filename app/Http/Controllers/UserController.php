<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\BodyParam;
use Knuckles\Scribe\Attributes\Header;

class UserController extends Controller
{
    public function index(UserService $userService): AnonymousResourceCollection
    {
        $users = $userService->index();

        return UserResource::collection($users);
    }

    #[Authenticated]
    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    #[BodyParam("profile_photo", "file", "User profile image.", required: false)]
    #[Authenticated]
    #[Header("_method","PUT")]
    public function update(UpdateRequest $request, UserService $userService): UserResource
    {
        $user = $userService->update($request, $request->user());

        return new UserResource($user);
    }
}
