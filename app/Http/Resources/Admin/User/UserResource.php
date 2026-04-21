<?php

namespace App\Http\Resources\Admin\User;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\User
 */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['name', 'email', 'phone', 'user_name', 'image', 'whtsapp', 'country_code', 'is_active', 'email_verified_at', 'remember_token', 'role', 'social_type', 'social_id', 'city_id', 'info', 'last_login_at', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }
        $data['image'] = $this->image
            ? url(str_replace('/storage/app/public', '/storage', $this->image))
            : null;
        $data['icon'] = $this->icon
            ? url(str_replace('/storage/app/public', '/storage', $this->icon))
            : null;
        return $data;
    }
}
