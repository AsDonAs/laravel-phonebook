<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneContactResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "second_name" => $this->second_name,
            "last_name" => $this->last_name,
            "phone" => $this->phone,
            "description" => $this->description,
            "is_favorite" => $this->is_favorite,
        ];
    }
}
