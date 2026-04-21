<?php

namespace App\Http\Resources\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'email'           => $this->email,
            'phone'           => $this->phone,
            'user_name'       => $this->user_name,
            'image'           => $this->image,
            'country_code'    => $this->country_code,
            'is_active'       => $this->is_active,
            'role'            => $this->role,
            'city_id'         => $this->city_id,
            'info'            => $this->info,
            'last_login_at'   => $this->last_login_at,
            'created_at'      => $this->created_at,
            'posts'  => $this->services_count ?? 0,
            'reviews_count'   => $this->reviews_count ?? 0,
        ];
    }
}
