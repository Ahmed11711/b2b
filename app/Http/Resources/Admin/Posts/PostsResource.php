<?php

namespace App\Http\Resources\Admin\Posts;

use App\Http\Resources\Api\Bids\BidesResource;
use App\Http\Resources\gallery\galleryResource;
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
        $fields = ['user_id', 'title', 'description', 'price_from', 'price_to', 'image', 'category_id', 'is_active', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        $data['image'] = $this->image
            ? url(str_replace('/storage/app/public', '/storage', $this->image))
            : null;
        $data['gallery'] = galleryResource::collection($this->whenLoaded('gallery'));
        $data['user'] = $this->whenLoaded('user');
        $data['bids'] = BidesResource::collection($this->whenLoaded('bids'));

        return $data;
    }
}
