<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\PersonController;
use App\Http\Controllers\Users\UserTypeController;
use App\Http\Controllers\Users\EducationLevelController;


Route::apiResource('/users', AuthController::class);
Route::get('/users/login', [AuthController::class, 'login'])->name('login');
Route::post('/users/register', [AuthController::class, 'register'])->name('register');
Route::post('/users/logout', [AuthController::class, 'logout'])->name('logout');

// Route::delete('/users/force-delete', [UserController::class, 'forceDelete']);
Route::apiResource('/roles', RoleController::class);
Route::apiResource('/persons', PersonController::class);
Route::apiResource('/user_types', UserTypeController::class);
Route::apiResource('/education_levels', EducationLevelController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

