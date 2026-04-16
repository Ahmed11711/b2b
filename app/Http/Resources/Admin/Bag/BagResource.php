<?php

namespace App\Http\Resources\Admin\Bag;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Bag
 */
class BagResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['title', 'image', 'icon', 'free', 'created_at', 'updated_at'];

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
