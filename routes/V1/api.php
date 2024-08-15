<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\UserController2;
use App\Http\Controllers\Users\PersonController;
use App\Http\Controllers\Users\UserTypeController;
use App\Http\Controllers\Users\EducationLevelController;


Route::post('/users/login', [AuthController::class, 'login'])->name('login');
Route::post('/users/register', [AuthController::class, 'register'])->name('register');

Route::group(["middleware"=>["auth:sanctum"] ], function() {
    Route::post('/users/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/users/add-permissions', [UserController::class, 'addPermissionToUser'])->name('add_permission_to_user');
    Route::get('/users/{user_id}/show-permissions', [UserController::class, 'permissionsOfUser'])->name('show_permissions_of_user');
    Route::delete('/users/remove-permissions', [UserController::class, 'removePermissionOfUser'])->name('remove_permission_of_user');
    
    Route::get('/roles/{role_id}/show-permissions', [RoleController::class, 'permissionsOfRole'])->name('show_permissions_of_role');
    Route::post('/roles/add-permissions', [RoleController::class, 'addPermissionToRole'])->name('add_permission_to_role');
    Route::delete('/roles/remove-permissions', [RoleController::class, 'removePermissionOfRole'])->name('remove_permission_of_role');
    
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/users2', UserController2::class);


    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/persons', PersonController::class);
    Route::apiResource('/user_types', UserTypeController::class);
    Route::apiResource('/education_levels', EducationLevelController::class);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

