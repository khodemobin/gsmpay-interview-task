<?php

namespace App\Services;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    public function index(): Collection
    {
        return User::sortByPostViewCount()->get();
    }

    public function update(UpdateRequest $request, User $user): User
    {
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photo', 'public');
            $user->profile_photo = config('app.url').'/storage/'.$path;
        }

        $user->update($request->except('profile_photo'));
        $user->save();

        return $user;
    }
}
