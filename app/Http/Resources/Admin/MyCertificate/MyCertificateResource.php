<?php

namespace App\Http\Resources\Admin\MyCertificate;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\MyCertificate
 */
class MyCertificateResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'title', 'issue_date', 'image', 'description', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        return $data;
    }
}