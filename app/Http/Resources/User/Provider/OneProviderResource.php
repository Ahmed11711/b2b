<?php

namespace App\Http\Resources\User\Provider;

use App\Http\Resources\Admin\Branch\BranchResource;
use App\Http\Resources\Admin\MyCertificate\MyCertificateResource;
use App\Http\Resources\Admin\Project\ProjectResource;
use App\Http\Resources\Admin\Service\ServiceResource;
use App\Http\Resources\Api\ReviewsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OneProviderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email ?? $this->username,
            'city_name'     => $this->city?->name,
            'bio'           => $this->info,
            'stats'         => [
                'rating' => round($this->reviews_avg_rating ?? 0, 1),
                'reviews_count' => $this->reviews_count ?? 0,
            ],

            'services'      => ServiceResource::collection($this->whenLoaded('services')),
            'projects'      => ProjectResource::collection($this->whenLoaded('projects')),
            'certificates'  => MyCertificateResource::collection($this->whenLoaded('certificates')),
            'branches'      => BranchResource::collection($this->whenLoaded('branches')),
            'reviews'       => ReviewsResource::collection($this->whenLoaded('reviews')),

            'created_at'    => $this->created_at->format('Y-m-d'),
        ];
    }
}
