<?php

namespace App\Http\Controllers;

use App\Models\User;

class TestController extends Controller
{
    public function create()
    {
        $users = User::query()->where('')->get();

        return $users;
    }
}
