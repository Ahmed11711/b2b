<?php

namespace App\Http\Resources\Admin\UserPackage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPacakgeResource extends JsonResource
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
            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,
            'active' => $this->active,
            'packageName' => $this->package->name ?? null,
            'created_at' => $this->created_at
        ];
    }
}
