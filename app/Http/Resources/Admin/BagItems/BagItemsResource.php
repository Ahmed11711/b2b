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
        $data['image'] = $this->image
            ? url(str_replace('/storage/app/public', '/storage', $this->image))
            : null;
        $data['items'] = $this->whenLoaded('gallery', function () {
            return $this->gallery->map(function ($item) {
                return [
                    'id'          => $item->id,
                    'bag_items_id' => $item->bag_items_id,
                    'image'       => $item->image
                        ? url(str_replace('/storage/app/public', '/storage', $item->image))
                        : null,
                    'type'        => $item->type,
                    'created_at'  => $item->created_at,
                    'updated_at'  => $item->updated_at,
                ];
            });
        });
        $data['bagsCategories'] = $this->whenLoaded('bagsCategories');

        return $data;
    }
}
