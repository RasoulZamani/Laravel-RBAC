<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\PersonController;
use App\Http\Controllers\Users\UserTypeController;
use App\Http\Controllers\Users\PermissionController;
use App\Http\Controllers\Users\AuthenticationController;
use App\Http\Controllers\Users\EducationLevelController;

// login and register
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/register-by-person/{person_id}', [AuthenticationController::class, 'registerByPerson'])->name('register_by_person');

Route::group(["middleware" => ["auth:sanctum"]], function () {
    // Auth :
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::post('/users/add-permissions', [UserController::class, 'addPermissionToUser'])->name('add_permission_to_user');
    Route::get('/users/{user_id}/show-permissions', [UserController::class, 'permissionsOfUser'])->name('show_permissions_of_user');
    Route::delete('/users/remove-permissions', [UserController::class, 'removePermissionOfUser'])->name('remove_permission_of_user');

    Route::get('/roles/{role_id}/show-permissions', [RoleController::class, 'permissionsOfRole'])->name('show_permissions_of_role');
    Route::post('/roles/add-permissions', [RoleController::class, 'addPermissionToRole'])->name('add_permission_to_role');
    Route::delete('/roles/remove-permissions', [RoleController::class, 'removePermissionOfRole'])->name('remove_permission_of_role');

    Route::apiResource('/users', UserController::class);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/persons', PersonController::class);
    Route::apiResource('/permissions', PermissionController::class);
    Route::apiResource('/user_types', UserTypeController::class);
    Route::apiResource('/education_levels', EducationLevelController::class);
});
