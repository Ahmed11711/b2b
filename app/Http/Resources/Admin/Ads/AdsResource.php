<?php

namespace App\Http\Resources\Admin\Ads;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Ads
 */
class AdsResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'category_id', 'status', 'title', 'title_ar', 'description', 'image', 'attachment_file', 'price', 'active', 'is_featured', 'published_at', 'expire_date', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        return $data;
    }
}