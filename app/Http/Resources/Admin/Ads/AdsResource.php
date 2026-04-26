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
        $fields = ['category_id', 'status', 'title', 'description', 'image', 'is_active', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        $data['category'] = $this->whenLoaded('category', function () {
            return [
                'id' => $this->category?->id,
                'name' => $this->category?->name,
            ];
        });
        $data['image'] = $this->image
            ? url(str_replace('/storage/app/public', '/storage', $this->image))
            : null;
        return $data;
    }
}
