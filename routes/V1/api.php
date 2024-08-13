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
// Route::delete('/users/force-delete', [UserController::class, 'forceDelete']);
Route::apiResource('/roles', RoleController::class);
Route::apiResource('/persons', PersonController::class);
Route::apiResource('/user_types', UserTypeController::class);
Route::apiResource('/education_levels', EducationLevelController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

