<?php

namespace App\Http\Resources\Admin\UserPacakges;

use App\Http\Resources\Admin\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\UserPacakges
 */
class UserPacakgesResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'package_id', 'starts_at', 'ends_at', 'active', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }
        $data['pakage'] = $this->package->name ?? "null";
        $data['user'] = new UserResource($this->whenLoaded('user'));
        return $data;
    }
}
