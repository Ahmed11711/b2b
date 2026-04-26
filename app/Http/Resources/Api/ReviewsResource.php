<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'rating'     => $this->rating,
            'comment'    => $this->comment,

            'service_name' => $this->service ? $this->service->title : "",

            'user_name'  => $this->user ? $this->user->name : 'Anonymous',
            'user_image' => $this->user ? $this->user->image : null,

            'created_at' => $this->created_atl,
        ];
    }
}
