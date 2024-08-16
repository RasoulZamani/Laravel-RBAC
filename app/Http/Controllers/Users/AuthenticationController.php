<?php

namespace App\Http\Controllers\Users;

use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Http\JsonResponse;
use App\Services\Role\RoleService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Services\Person\PersonService;
use App\Http\Requests\Users\LoginRequest;
use App\Repositories\Role\RoleRepository;
use App\Services\User\UserServiceInterface;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Requests\Users\RegisterUserRequest;
use App\Http\Requests\Users\RegisterByPersonRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\Authentication\AuthenticationServiceInterface;

class AuthenticationController extends Controller
{
    protected $authService;

    public function __construct(AuthenticationServiceInterface $authService)
    {
        $this->authService = $authService;
    }
    

    /*****************************************************************
     * Register User from base 
     */
    public function register(RegisterUserRequest $registerRequest) {
        // we should create person and user in this endpoint
       
        //validation
        $validatedData = $registerRequest->validated();
        
        return $this->authService->register($validatedData);
    
    }

    /*****************************************************************
     * Register user by person_id
     */
    public function registerByPerson(string $personId, RegisterByPersonRequest $registerByPersonRequest){
        //validation
        $validatedData = $registerByPersonRequest->validated();
      
        return $this->authService->registerByPersonId(
            $personId,
            $validatedData,
        );
    }

    /*****************************************************************
     * Log out
     */ 
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return apiResponse(message: __("messages.logout"));
    }

    /*****************************************************************
     * Login
     */
    public function login(LoginRequest $loginRequest) {
        
        // validation
        $validatedData = $loginRequest->validated();

        return $this->authService->login($validatedData);
        
    }

}
