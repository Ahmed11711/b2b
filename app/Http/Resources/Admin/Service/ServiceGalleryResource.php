<?php

namespace App\Http\Resources\Admin\Service;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\ServiceImage
 */
class ServiceGalleryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'service_id' => $this->service_id,
            'image' => $this->image
                ? rtrim(config('app.url'), '/') . '/' . ltrim(str_replace('/storage/app/public', 'storage', $this->image), '/')
                : null,
        ];
    }
}
