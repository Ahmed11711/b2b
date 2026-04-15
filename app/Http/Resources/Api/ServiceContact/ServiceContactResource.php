<?php

namespace App\Http\Resources\Api\ServiceContact;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'contact_name' => $this->userContact ? $this->userContact->type : null,
            'contact_value' => $this->userContact ? $this->userContact->value : null,
            'user_contact_id' => $this->user_contact_id,
        ];
    }
}
