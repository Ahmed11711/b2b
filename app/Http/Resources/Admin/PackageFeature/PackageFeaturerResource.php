<?php

namespace App\Http\Resources\Admin\PackageFeature;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageFeaturerResource extends JsonResource
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
            'package_id' => $this->package_id,
            'feature_id' => $this->feature_id,
            'feature_name' => $this->feature ? $this->feature->key : null,
            'value' => $this->value,
            'lable' => $this->lable,
        ];
    }
}
