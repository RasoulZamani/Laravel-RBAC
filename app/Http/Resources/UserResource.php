<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this);
        return [
            "id" => $this->id,
            "username"=> $this->username,
            "is_active" => $this->is_active,
            "user_type_id" => $this->user_type_id,
            "person_id" => $this->person_id,
            "role_id" => $this->role_id,
            
        ];
        
    }
}
