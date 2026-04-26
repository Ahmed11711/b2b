<?php

namespace App\Http\Resources\Admin\BagItems;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\BagItems
 */
class BagItemsResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['bags_categories_id', 'title', 'price', 'image', 'currency', 'rating', 'desc', 'Whose', 'what_will_you_get', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }
        $data['items'] = $this->whenLoaded('gallery');
        $data['bagsCategories'] = $this->whenLoaded('bagsCategories');

        return $data;
    }
}
