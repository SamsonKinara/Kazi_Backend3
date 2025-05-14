<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;


Route::post('/profile-setup', [ProfileController::class, 'store']);



//Public Routes
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/profile-setup', [UserProfileController::class, 'setup']);



Route::middleware('auth:sanctum')->group(function () {
    //Auth Routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user_info', [AuthController::class, 'user_info']);
    Route::get('/jobs', [JobController::class, 'index']);
    Route::post('/jobs', [JobController::class, 'store']);
    
    
    // Route::post('Role', [RoleController::class, 'createRole']);
    // Route::get('getRole', [RoleController::class, 'index']);
    // Route::get('Role/{id}', [RoleController::class, 'getRole']);
    // Route::put('updateRole/{id}', [RoleController::class, 'updateRole']);
    // Route::delete('deleteRole/{id}', [RoleController::class, 'deleteRole']);
});