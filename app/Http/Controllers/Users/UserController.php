<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseCRUDController
{
    public function __construct(User $user, $persianNameSingle="کاربر" , $persianNamePlural="کاربران")
    {
        parent::__construct($user, $persianNameSingle, $persianNamePlural);
    }
}
