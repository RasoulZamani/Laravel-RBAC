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
    // login 
    public function login(LoginRequest $loginRequest):JsonResponse {
        
        // validation
        $loginRequest->validated($loginRequest->all());
        
        // get person by mobile number
        try {
            $person = Person::where('mobile_number', $loginRequest->mobile_number)->firstOrFail();            
        } catch(ModelNotFoundException $e) {   
            return apiResponse(message: __(
                "messages.invalid_credentials",
            ), statusCode:401);
        }
        // get all users that related to this person
        $relatedUsers = $person->users;
        // if this person has no user info:
        if ($relatedUsers->isEmpty()) {
            return apiResponse(message: __(
                "messages.invalid_credentials",
            ), statusCode:401);
        }
        // check password for all related users to this person
        $tokenCreatedForOneUser = false; 
        foreach($relatedUsers as $relatedUser) {
            if (Hash::check( $loginRequest->password, $relatedUser->password)) {
                $token = $relatedUser->createToken(
                    'API Token for' . $relatedUser->id,
                    // Ability::getAbilities($user), 
                    // now()->addMonth(),
                )->plainTextToken;
                $tokenCreatedForOneUser = true;
            }
        }
        if (!$tokenCreatedForOneUser) {
            return apiResponse(message: __(
                "messages.invalid_credentials",
            ), statusCode:401);
        } else {
            return apiResponse(
                message: __("messages.login_token_created"),
                data: [
                    "token" => $token,
                    "token_type" => "Bearer"
                ]
            );
        }
 
        // $user = User::where('email',$request->email)->first();

        // return $this->ok($message="Authenticated", $data=[
        //     'token' => $user->createToken(
        //         'API token for' . $user->email,
        //         Ability::getAbilities($user), 
        //         now()->addMonth()
        //         )->plainTextToken
        // ]);
        
    }
    
    // Log out
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return apiResponse(message: __("messages.logout"));
    }

    // Register User
    public function register(RegisterRequest $registerRequest):JsonResponse {
        // we should create person and user in this endpoint
       
        //validation
        $registerRequest->validated($registerRequest->all());
        // check relations
        if ($registerRequest->education_level_id) {
            try {
                $educationLevel = EducationLevel::findOrFail($registerRequest->education_level_id);
            } catch(ModelNotFoundException $e) {
                return apiResponse(message: __(
                    "messages.not_found_education_level",
                    ["id" =>  $registerRequest->education_level_id],
                ), statusCode:404);
            }
        }
        if ($registerRequest->image_id) {
            try {
                $imageName = Image::findOrFail($registerRequest->image_id);
            } catch(ModelNotFoundException $e) {
                return apiResponse(message: __(
                    "messages.not_found_image",
                    ["id" =>  $registerRequest->image_id],
                ), statusCode:404);
            }
        }

        // create person 
        $createdPerson = Person::create([
            'name' => $registerRequest->name,
            'last_name' => $registerRequest->last_name,
            'father_name' =>  $registerRequest->father_name ,
            'alias_name' => $registerRequest->alias_name ,
            'gender' => $registerRequest->gender ,
            'is_legal' => $registerRequest->is_legal ,
            'national_code' => $registerRequest->national_code ,
            'mobile_number' => $registerRequest->mobile_number,
            'email' => $registerRequest-> email,
            'birth_date' => $registerRequest->birth_date ,
            
            'education_level_id' => $registerRequest->education_level_id ,
            'image_id' => $registerRequest-> image_id,
        ]);

        // create user
        User::create([
            'username' => $registerRequest->username,
            'password' => Hash::make($registerRequest->password),
            'is_active' => $registerRequest->is_active ?? True,
            //'role_id' => null, // for default user role will be null
            'person_id' => $createdPerson->id,
        ]);
    
        return apiResponse(message:__("messages.register_user"));
    
    }
}
