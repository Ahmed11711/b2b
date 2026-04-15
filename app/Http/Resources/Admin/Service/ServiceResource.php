<?php

namespace App\Http\Resources\Admin\Service;

use App\Http\Resources\Admin\Category\CategoryResource;
use App\Http\Resources\Admin\User\UserResource;
use App\Http\Resources\Api\ReviewsResource;
use App\Http\Resources\Api\ServiceContact\ServiceContactResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Service
 */
class ServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'category_id', 'city_id', 'title', 'desc', 'image', 'price', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        $data['user'] = new UserResource($this->whenLoaded('user'));

        $data['category'] = new CategoryResource($this->whenLoaded('category'));
        $data['contacts'] = ServiceContactResource::collection($this->whenLoaded('contacts'));
        $data['reviews'] = ReviewsResource::collection($this->whenLoaded('reviews'));


        return $data;
    }
}
