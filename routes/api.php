<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/auth/login', [AuthController::class, "login"]);
Route::get('/users', [UserController::class, 'index']);

Route::middleware('auth:sanctum')->group(static function () {
    Route::get('/users/profile', [UserController::class, 'me']);
    Route::put('/users', [UserController::class, 'update']);

    Route::get("posts", [PostController::class, 'index']);
    Route::get("posts/{post}", [PostController::class, 'show']);
});
