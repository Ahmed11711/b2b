<?php

namespace App\Http\Resources\Api\Bids;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BidesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user->name ?? null,
            'user_image' => $this->user->image ?? null,
            'status' => $this->status,
            'created_at' => $this->created_at
        ];
    }
}
