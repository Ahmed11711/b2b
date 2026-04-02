<?php

namespace App\Http\Resources\Admin\UserInfo;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\UserInfo
 */
class UserInfoResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'country_id', 'city_id', 'info', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        return $data;
    }
}