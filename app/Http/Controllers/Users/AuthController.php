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
     * Log out
     */ 
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return apiResponse(message: __("messages.logout"));
    }
    
    /**
     * Login
     */
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
