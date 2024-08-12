<?php

namespace App\Http\Controllers\Users;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\Persons\PersonUpdateRequest;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\Persons\PersonCreateRequest;

class PersonController extends BaseCRUDController
{
    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        Person $person,
        $persianNameSingle="فرد",
        $persianNamePlural="افراد",
        $updateRequest=PersonUpdateRequest::class,
        $createRequest=PersonCreateRequest::class)
    {
        parent::__construct(
            model: $person,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest);
    }

}
