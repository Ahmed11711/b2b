<?php

namespace App\Http\Resources\gallery;

use App\Traits\BuildsFileUrl;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class galleryResource extends JsonResource
{
    use BuildsFileUrl;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->image
                ? $this->buildFileUrl($this->image)
                : null
        ];
    }
}
