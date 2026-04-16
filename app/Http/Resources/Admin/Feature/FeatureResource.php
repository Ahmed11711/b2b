<?php

namespace App\Http\Resources\Admin\Feature;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Feature
 */
class FeatureResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['key', 'lable', 'type', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        return $data;
    }
}