<?php

namespace App\Http\Controllers\Users;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

use App\Http\Resources\PermissionResource;
use App\Services\User\UserServiceInterface;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Requests\Users\AddOrRemovePermissionToUserRequest;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    

    /****************************************************************
    * Display a listing of the users.
    */
    public function index(Request $request) {
        // check permissions
        $this->authorize('viewAny', User::class);
        
        // get data from user service
        $users = $this->userService->findAll();
        //$users = User::searchRecords($request->toArray())->addedQuery();
        
        $usersCollection = UserResource::collection($users['data'] ?? $users); // ?? $user is for pagination by searchOrder 
       
        return apiResponse(
            success:true,
            message:__("messages.index", ["attribute"=>"کاربران"]),
            data: $usersCollection->resource,
        );
    }

    /****************************************************************
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $requestCreate)
    {
        // check perm
        $this->authorize('create', User::class);

        //validation
        $validatedData = $requestCreate->validated();

        // create user 
        $instance = $this->userService->create($validatedData);
        
        return apiResponse(
            message: __(
                "messages.store" ,
                ["attribute" => "کاربر"]),
            data: new UserResource($instance)
        );
    }

    /****************************************************************
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse { 
        
        $instance = $this->userService->find($id);
        
        // check policy
        $this->authorize('view', $instance);
        
        return apiResponse(
            success:true,
            message:__("messages.show", ["attribute"=> "کاربر" ]),
            data: new UserResource($instance)
        );
    }


    /****************************************************************
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $requestUpdate,string $id) {
        //validation
        $validatedData = $requestUpdate->validated();

        // get instance that we want to update
        $instance = $this->userService->find($id);
        
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

    /****************************************************************
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse {
        
        // get instance that we want to delete
        $instance = $this->userService->find($id);
        
        // check policy
        $this->authorize('delete', $instance);
        
        //remove instance
        $instance->delete();
        
        return apiResponse(
            message: __(
                "messages.delete",
                ["attribute" =>  "کاربر",
                'number' => $instance->id]
            ));
    }

    /****************************************************************
    * Get all permissions assigned to a user
    */
    public function permissionsOfUser(string $user_id) {
        $userPermissions = $this->userService->getPermissions($user_id);
        $userPermissionsCollection = PermissionResource::collection($userPermissions);
        return apiResponse(
            message: __("messages.index", ["attribute"=> " دسترسی های کاربر"]),
            data: $userPermissionsCollection,
        );
    }

    /****************************************************************
     * Assign permission to a user based on its role
     */
    public function addPermissionToUser(AddOrRemovePermissionToUserRequest $addPermissionToUserRequest) {
        // validation
        $validatedData = $addPermissionToUserRequest->validated();

        return $this->userService->addPermission(
            $validatedData['user_id'],
            $validatedData['permission_ids'],
        );
    }

    /****************************************************************
     * Remove Permissions of a user
     */
    public function removePermissionOfUser(AddOrRemovePermissionToUserRequest $removePermissionsOfUser) {
        // validation
        $validatedData = $removePermissionsOfUser->validated();

        return $this->userService->removePermission(
            $validatedData['user_id'],
            $validatedData['permission_ids'],
        );
    }
}
