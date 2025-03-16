<?php

use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/getAllRoles',
[RoleController::class, 'index']);

Route::post('/createRole',
[RoleController::class, 'createRole']);

Route::get('/getRole/{id}',
[RoleController::class,'getRole']);
