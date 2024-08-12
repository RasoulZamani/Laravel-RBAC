<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\testREq;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::get('/', function (Request $request){
//     $roles = Role::searchRecords($request->toArray())->addedQuery();
//     return apiResponse(success:true, message:__("messages.index",["attribute"=>"نفش"]),data: $roles, statusCode:200,meta:[2]);
// });
// Route::apiResource('/users', UserController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

