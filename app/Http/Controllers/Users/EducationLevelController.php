<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\EducationLevels\EducationLevelCreateRequest;
use App\Http\Requests\EducationLevels\EducationLevelUpdateRequest;

class EducationLevelController extends BaseCRUDController
{

    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        EducationLevel $educationLevel,
        $persianNameSingle="سطح تحصیلات",
        $persianNamePlural="سطوح تحصیلات",
        $updateRequest=EducationLevelUpdateRequest::class,
        $createRequest=EducationLevelCreateRequest::class)
    {
        parent::__construct(
            model: $educationLevel,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest);
    }

}

