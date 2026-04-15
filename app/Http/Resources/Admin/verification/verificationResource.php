<?php

namespace App\Http\Resources\Admin\verification;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\verification
 */
class verificationResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'id_card_front', 'id_card_back', 'commercial_register', 'tax_card', 'status', 'notes', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        return $data;
    }
}