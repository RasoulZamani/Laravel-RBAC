<?php

namespace App\Http\Controllers\Users;

use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use App\Models\Person;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\LoginRequest;
use App\Http\Requests\Users\RegisterRequest;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\Users\AddOrRemovePermissionToUserRequest;

class UserController2 extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
    

    /**
     * Assign permission to a user based on its role
     */
    public function addPermissionToUser(AddOrRemovePermissionToUserRequest $addPermissionToUserRequest) {
        // validation
        $validatedData = $addPermissionToUserRequest->validated();

        //fetch user with this user_id and load its role
        $user = User::with('role')->findOrFail($validatedData['user_id']);

        // fetch available permission for user's role
        $availablePermissions = $user->role->permissions;

        // fetch existing permissions for this user
        $existingPermissions = $user->permissions;
        // dd($existingPermissions[2]->id); 
        // check if permissions are exists in user role and already not exist
        foreach($validatedData['permission_ids'] as $permissionId) {
            if (!$availablePermissions->contains($permissionId)) {
                return apiResponse(
                    message: __("messages.permission_not_available_for_this_role"),
                    data: ["not_allowed_permission_id" => $permissionId],
                    statusCode:400,
                );
            }
            // check that these permission is already assigned
            if ($existingPermissions->contains($permissionId)) {
                return apiResponse(
                    message: __("messages.permission_is_already_exists_for_this_user"),
                    data: ["permission_already_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // add permissions to user
        $user->permissions()->attach($validatedData['permission_ids']);
        return apiResponse(
            message: __("messages.attach_permissions_to_user"),
            //data: ["user_id" => $user->id, "assigned_permissions"=>[$user->permissions]],
        );
   }

   /**
    * Get permissions assigned to user
    */
    public function permissionsOfUser(string $user_id) {
        // fetch user by user_id
        $user = User::findOrFail($user_id);
        return apiResponse(
            message: __("messages.index", ["attribute"=> "دسترسی های کاربر"]),
            data:[ $user->permissions],
        );
    }

    /**
     * Remove Permissions of a user
     */
    public function removePermissionOfUser(AddOrRemovePermissionToUserRequest $removePermissionsOfUser) {
        // validation
        $validatedData = $removePermissionsOfUser->validated();

        //fetch role with this role_id and load its role
        $user = User::with('permissions')->findOrFail($validatedData['user_id']);
        
        // fetch existing permissions for this user
        $existingPermissions = $user->permissions;
        // dd($existingPermissions); 
        // check if permissions is exist  (if not exist we can not delete it)
        foreach($validatedData['permission_ids'] as $permissionId) {
            if (!$existingPermissions->contains($permissionId)) {
                return apiResponse(
                    message: __("messages.permission_is_not_exists_for_this_user"),
                    data: ["permission_not_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // remove permissions of user
        $user->permissions()->detach($validatedData['permission_ids']);
        return apiResponse(
            message: __("messages.detach_permissions_to_user"),
        );    
    }

    /**
    * Display a listing of the users.
    */
    public function index(Request $request) {
        // check permissions
        $this->authorize('viewAny', User::class);
        $users = $this->userRepository->findAll();
        //$users = User::searchRecords($request->toArray())->addedQuery();
        $usersColl = UserResource::collection($users['data'] ?? $users); // ?? $user is for paginations
       
        return apiResponse(
            success:true,
            message:__("messages.index", ["attribute"=>"کاربران"]),
            data: $usersColl->resource,
            // data: (User::searchRecords($request->toArray())->addedQuery()),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $requestCreate)
    {
        // check policy
        $this->authorize('create', User::class);

        //validation
        $validatedData = $requestCreate->validated();

        $instance = User::create($validatedData);
        return apiResponse(
            message: __(
                "messages.store" ,
                ["attribute" => "کاربر"]),
            data: new UserResource($instance)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse {
       
        $instance = User::findOrFail($id);//->searchRecords($request->toArray())->addedQuery(),
        
        // check policy
        $this->authorize('view', $instance);
        
        return apiResponse(
            success:true,
            message:__("messages.show", ["attribute"=> "کاربر" ]),
            data: new UserResource($instance)
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
        
        // check policy
        $this->authorize('update', $instance);

        $instance->update($validatedData);
        return apiResponse(
            message: __(
                "messages.update",
                ["attribute"=> "کاربر" ]),
            data: new UserResource($instance)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse {
        // get instance that we want to delete
        $instance = User::findOrFail($id);
        
        // check policy
        $this->authorize('delete', $instance);
        
        $instance->delete();
        return apiResponse(
            message: __(
                "messages.delete",
                ["attribute" =>  "کاربر",
                'number' => $instance->id]
            ));
    }
}
