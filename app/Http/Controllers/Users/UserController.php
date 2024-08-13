<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Image;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\LoginRequest;
use App\Http\Requests\Users\RegisterRequest;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    
     /**
     * Display a listing of the users.
     */
    public function index(Request $request) {
        return apiResponse(
            success:true,
            message:__("messages.index", ["attribute"=>"کاربران"]),
            data: User::searchRecords($request->toArray())->addedQuery(),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $requestCreate)
    {
        //validation
        $validatedData = $requestCreate->validated();

        $instance = User::create($validatedData);
        return apiResponse(
            message: __(
                "messages.store" ,
                ["attribute" => "کاربر"]),
            data: $instance
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse {

        return apiResponse(
            success:true,
            message:__("messages.show", ["attribute"=> "کاربر" ]),
            data: User::findOrFail($id),//->searchRecords($request->toArray())->addedQuery(),
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $requestUpdate,string $id) {
        //validation
        $validatedData = $requestUpdate->validated();

        // get instance that we want to update
        $instance = User::findOrFail($id);
        $instance->update($validatedData);
        return apiResponse(
            message: __(
                "messages.update",
                ["attribute"=> "کاربر" ]),
            data: $instance
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse {
        // get instance that we want to delete
        $instance = User::findOrFail($id);
        $instance->delete();
        return apiResponse(
            message: __(
                "messages.delete",
                ["attribute" =>  "کاربر",
                'number' => $instance->id]
            ));
    }
}
