<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email ?? null,
            'phone'             => $this->phone ?? null,
            'user_name'         => $this->user_name,
            'whtsapp'           => $this->whtsapp, // Fixed typo from 'whatsapp' if that's your DB column name
            'country_code'      => $this->country_code,
            'is_active'         => (int) $this->is_active,
            'is_verified'       => !is_null($this->email_verified_at),
            'role'              => $this->role,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
