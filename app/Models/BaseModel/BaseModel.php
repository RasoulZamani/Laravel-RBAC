<?php

namespace App\Models\BaseModel;

use App\Traits\TimeModel;
use App\Traits\SearchRecords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory, SoftDeletes, TimeModel, SearchRecords;
    
}
