<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"                 => $this->id,
            "name"               => $this->name,
            "last_name"          => $this->last_name,
            "father_name"        => $this->father_name , 
            "mobile_number"      => $this->mobile_number,
            "national_code"      => $this->national_code ,
            "gender"             => $this->gender , 
            "is_legal"           => $this->is_legal ,  
            "email"              => $this->email , 
            "birth_date"         => $this->birth_date , 
            "is_active"          => $this-> is_active, 
            "education_level_id" => $this-> education_level_id, 
            "is_active"          => $this-> image_id, 
            "created_at"         => $this-> created_at, 
            "updated_at"         => $this-> updated_at, 
            "deleted_at"         => $this-> updated_at,            
        ];
        
    }
}
