<?php

namespace App\Http\Resources\Api\ProfileAccount;

use App\Http\Resources\Admin\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'name'               => $this->name,
            'email'              => $this->email,
            'phone'              => $this->phone,
            'user_name'          => $this->user_name,
            'whtsapp'            => $this->whtsapp,
            'country_code'       => $this->country_code,
            'info'               => $this->info,
            'created_at'         => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'         => $this->updated_at->format('Y-m-d H:i:s'),
            'all_categories' => $this->all_categories_with_selection ?? [],
            'image' => $this->image
                ? url(str_replace('/storage/app/public', '/storage', $this->image))
                : null,
        ];
    }
}
