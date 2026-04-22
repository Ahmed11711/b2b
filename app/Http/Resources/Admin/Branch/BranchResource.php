<?php

namespace App\Http\Resources\Admin\Branch;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Branch
 */
class BranchResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'title', 'address', 'mobile', 'created_at', 'updated_at', 'location'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }
        $data['location'] = [
            'lat' => $this->lat ? (float) $this->lat : null,
            'lng' => $this->lng ? (float) $this->lng : null,
            'map_link' => ($this->lat && $this->lng)
                ? "https://www.google.com/maps?q={$this->lat},{$this->lng}"
                : null,
        ];
        return $data;
    }
}
