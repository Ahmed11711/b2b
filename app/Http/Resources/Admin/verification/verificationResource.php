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

        $data['id_card_front']       = $this->buildFileUrl($this->id_card_front);
        $data['id_card_back']        = $this->buildFileUrl($this->id_card_back);
        $data['commercial_register'] = $this->buildFileUrl($this->commercial_register);
        $data['tax_card']            = $this->buildFileUrl($this->tax_card);

        $data['user_name'] = $this->user->name ?? null;

        return $data;
    }


    protected function buildFileUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        $path = str_replace('/storage/app/public', '/storage', $path);
        $path = '/' . ltrim($path, '/');

        return rtrim(url('/api'), '/') . $path;
    }
}
