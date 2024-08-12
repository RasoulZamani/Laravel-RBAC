<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationLevel extends BaseModel
{
    use HasFactory;
    protected array $searchFields = [
        "id", "title", "description"
    ];
}
