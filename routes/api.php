<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/auth/login', [AuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(static function () {
    Route::get('/user', [UserController::class, 'me']);
    Route::put('/user', [UserController::class, 'update']);
});
