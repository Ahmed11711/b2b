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
        $fields = ['title', 'title_ar', 'image', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        return $data;
    }
}