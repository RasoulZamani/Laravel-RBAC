<?php

namespace App\Services\Authentication;

use App\Services\Base\BaseService;
use App\Services\Role\RoleService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Hash;
use App\Services\Person\PersonService;
use App\Services\UserType\UserTypeService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Authentication\AuthenticationRepositoryInterface;

class AuthenticationService implements AuthenticationServiceInterface
{   
    protected $userService;
    protected $roleService;
    protected $personService;
    protected $userTypeService;

    public function __construct(
        UserService $userService,
        PersonService $personService,
        RoleService $roleService,
        UserTypeService $userTypeService
        ) {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->personService = $personService;
        $this->userTypeService = $userTypeService;

    }

    /****************************************************************
     * Register user by getting needed information of person and user and create instance in both table
     */
    public function register(array $attributes) {
        //  Extract person fields
        $personAttributes = [
            'name'               => $attributes['name'],
            'last_name'          => $attributes['last_name'],
            'father_name'        => $attributes['father_name'] ,
            'alias_name'         => $attributes['alias_name'] ,
            'gender'             => $attributes['gender'] ,
            'is_legal'           => $attributes['is_legal'] ,
            'national_code'      => $attributes['national_code'] ,
            'mobile_number'      => $attributes['mobile_number'],
            'email'              => $attributes['email'],
            'birth_date'         => $attributes['birth_date'] ,
            'education_level_id' => $attributes['education_level_id'] ,
            //'image_id'       => $validatedData['image_id'],
        ];

        // create person
        $createdPerson = $this->personService->create($personAttributes);

        // get default role and user type for general users
        $generalUserRole = $this->roleService->findByTitle('User');
        $generalUserType = $this->userTypeService->findByTitle('Usual_user');

        $userAttributes = [ // user fields
            'username'     => $attributes['username'],
            'password'     => Hash::make($attributes['password']),
            'is_active'    => $attributes['is_active'] ?? True,
            'user_type_id' => $generalUserType->id,
            'role_id'      => $generalUserRole->id, // at first we assign default general role to user, then we can promote it in another point
            'person_id'    => $createdPerson->id,
        ];

        // create user
        $this->userService->create($userAttributes);

        return apiResponse(message:__("messages.register_user"));
    } 

    /*****************************************************************
     * Register user by getting user info and person_id
     */
    public function registerByPersonId(string $personId, array $userAttributes ) {

        // get default role and type for general users
        $generalUserRole = $this->roleService->findByTitle('User');
        $generalUserType = $this->userTypeService->findByTitle('Usual_user');

        $userAttributes = [ // extract user fields
            'username'     => $userAttributes['username'],
            'password'     => Hash::make($userAttributes['password']),
            'is_active'    => $userAttributes['is_active'] ?? True,
            'user_type_id' => $generalUserType->id,
            'role_id'      => $generalUserRole->id, // at first we assign default general role to user, then we can promote it in another point
            'person_id'    => $personId,
        ];

        // create user
        $this->userService->create($userAttributes);

        return apiResponse(message:__("messages.register_user"));
    } 

    /*****************************************************************
     * Login
     */
    public function login(array $attributes) {
        
        // get person by mobile number
        try {
            $person =$this->personService->findByMobile($attributes['mobile_number']);            
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
            if (Hash::check( $attributes['password'], $relatedUser->password)) {
                $token = $relatedUser->createToken(
                    'API Token for' . $relatedUser->id,
                    // Ability::getAbilities($user), 
                    //now()->addMonth(),
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
}
