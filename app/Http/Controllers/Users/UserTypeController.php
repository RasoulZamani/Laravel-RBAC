<?php

namespace App\Http\Controllers\Users;

use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\UserTypes\UserTypeCreateRequest;
use App\Http\Requests\UserTypes\UserTypeUpdateRequest;

class UserTypeController extends BaseCRUDController
{

    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        UserType $userType,
        $persianNameSingle="انواع کاربر",
        $persianNamePlural="انواع کاربران",
        $updateRequest=UserTypeUpdateRequest::class,
        $createRequest=UserTypeCreateRequest::class)
    {
        parent::__construct(
            model: $userType,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest);
    }

}

