<?php

namespace App\Http\Controllers\Users;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\LoginRequest;
use App\Http\Requests\Users\RegisterUserRequest;
use App\Http\Requests\Users\RegisterByPersonRequest;
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
