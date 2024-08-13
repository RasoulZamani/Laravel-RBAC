<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;

class AuthController extends Controller
{
    
     /**
     * Display a listing of the users.
     */
    public function index(Request $request) {
        return apiResponse(
            success:true,
            message:__("messages.index", ["attribute"=>"کاربران"]),
            data: User::searchRecords($request->toArray())->addedQuery(),

            // data: $this->model::searchRecords($request->toArray())->addedQuery(function ($query){
            //     return $query->withTrashed();
            // }),
            statusCode:200
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
    // // login 
    // public function login(ApiLoginRequest $request):JsonResponse {
    //     $request->validated($request->all());

    //     if (!Auth::attempt($request->only('phone','password'))) {
    //         return $this->error($message="Invalid credentials", $statusCode=401);
    //     }

    //     $user = User::where('email',$request->email)->first();

    //     return $this->ok($message="Authenticated", $data=[
    //         'token' => $user->createToken(
    //             'API token for' . $user->email,
    //             Ability::getAbilities($user), 
    //             now()->addMonth()
    //             )->plainTextToken
    //     ]);
        
    // }

    // // Log out
    // public function logout(Request $request) {
    //     $request->user()->currentAccessToken()->delete();
    //     return $this->ok("You logged out! See you soon:)");
    // }

    // // Register
    // public function register(ApiLoginRequest $request):JsonResponse {
    //     return $this->ok("$request->email was registered.");
    // }
}
