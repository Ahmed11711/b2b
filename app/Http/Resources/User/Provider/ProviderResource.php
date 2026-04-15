<?php

namespace App\Http\Resources\User\Provider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'name'  => $this->name,
            'email' => $this->email ?? $this->username ?? $this->name,
            'image' => $this->image ?? 'default.png',
            'city_name'     => $this->city?->name_en ?? 'N/A',
            'stats'         => [
                'rating' => round($this->reviews_avg_rating ?? 0, 1),
                'total_reviews' => $this->reviews_count ?? 0,
            ],
            'top_reviews'   => $this->whenLoaded('reviews', function () {
                return $this->reviews->take(2);
            }),
        ];
    }
}
