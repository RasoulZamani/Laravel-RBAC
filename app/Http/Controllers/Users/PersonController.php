<?php

namespace App\Http\Controllers\Users;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\Persons\PersonUpdateRequest;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\Persons\PersonCreateRequest;
use App\Http\Resources\PersonResource;
use App\Services\Person\PersonService;

class PersonController extends BaseCRUDController
{
    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        Person $person,
        $service = PersonService::class,
        $persianNameSingle="فرد",
        $persianNamePlural="افراد",
        $updateRequest=PersonUpdateRequest::class,
        $createRequest=PersonCreateRequest::class,
        $apiResource=PersonResource::class)
    {
        parent::__construct(
            model: $person,
            service: $service,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest,
            apiResource: $apiResource);
    }


}
