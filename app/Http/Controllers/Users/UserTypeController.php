<?php

namespace App\Http\Controllers\Users;

use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\UserTypes\UserTypeCreateRequest;
use App\Http\Requests\UserTypes\UserTypeUpdateRequest;
use App\Http\Resources\UserTypeResource;
use App\Services\UserType\UserTypeService;
use Spatie\FlareClient\Api;

class UserTypeController extends BaseCRUDController
{

    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        UserType $userType,
        $service=UserTypeService::class,
        $persianNameSingle="انواع کاربر",
        $persianNamePlural="انواع کاربران",
        $updateRequest=UserTypeUpdateRequest::class,
        $createRequest=UserTypeCreateRequest::class,
        $apiResource=UserTypeResource::class)
    {
        parent::__construct(
            model: $userType,
            service:$service,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest,
            apiResource:$apiResource);
    }

}

