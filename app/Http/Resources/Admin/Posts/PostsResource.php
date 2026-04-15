<?php

namespace App\Http\Resources\Admin\Posts;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Posts
 */
class PostsResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'title', 'description', 'price_from', 'price_to', 'image', 'is_active', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }
        $data['gallery'] = $this->whenLoaded('gallery');

        return $data;
    }
}
