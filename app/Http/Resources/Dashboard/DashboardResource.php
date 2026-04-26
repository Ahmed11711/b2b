<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\Admin\UserPackage\UserPacakgeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_package' => $this->resource['user_package']
                ? new UserPacakgeResource($this->resource['user_package'])
                : null,
            // 'user_package'          => $this->resource['user_package'],
            'services_count'        => $this->resource['services_count'],
            'provider_visits_count' => $this->resource['provider_visits_count'],
        ];
    }
}
