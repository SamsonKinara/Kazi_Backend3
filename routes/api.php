<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/profile', [ProfileController::class, 'store']); // Save/update profile
    Route::get('/profile', [ProfileController::class, 'show']);  // Get profile

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user_info', [AuthController::class, 'user_info']);

    Route::get('/jobs', [JobController::class, 'index']);
    Route::post('/jobs', [JobController::class, 'store']);

    // Add role routes if needed
    // Route::post('Role', [RoleController::class, 'createRole']);
    // Route::get('getRole', [RoleController::class, 'index']);
    // Route::get('Role/{id}', [RoleController::class, 'getRole']);
    // Route::put('updateRole/{id}', [RoleController::class, 'updateRole']);
    // Route::delete('deleteRole/{id}', [RoleController::class, 'deleteRole']);
});

// Public routes
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
