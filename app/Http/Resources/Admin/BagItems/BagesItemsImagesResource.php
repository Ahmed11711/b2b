<?php

namespace App\Http\Resources\Admin\BagItems;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BagesItemsImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "bag_items_id" => $this->bag_items_id,
            "image"       => $this->image
                ? url(str_replace('/storage/app/public', '/storage', $this->image))
                : null,

            "type" => $this->type,
            "created_at" => $this->created_at,
        ];
    }
}
