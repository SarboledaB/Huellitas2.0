<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoundationsResource extends JsonResource
{
    public function toArray($request)
    {
        $id = $this->getId();
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'description' => $this->getDescription(),
            'url' => "http://127.0.0.1:8000/user/foundations/show/$id"
        ];
    }
}
