<?php

namespace App\Http\Resources\Admin\City;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\City
 */
class CityResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['country_id', 'name_ar', 'name_en', 'is_active', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        return $data;
    }
}