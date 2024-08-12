<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;

class UserController extends BaseCRUDController
{
    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        User $user,
        $persianNameSingle="کاربر",
        $persianNamePlural="کاربران",
        $updateRequest=UserUpdateRequest::class,
        $createRequest=UserCreateRequest::class)
    {
        parent::__construct(
            model: $user,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest);
    }
}
