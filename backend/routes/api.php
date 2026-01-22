<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return 'hello';
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('tasks', TaskController::class)->only(['index', 'store', 'update', 'destroy']);
});
