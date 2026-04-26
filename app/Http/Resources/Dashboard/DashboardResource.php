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
            'profile_completion'    => $this->resource['user']->getProfileCompletion(),
            'user_package'          => $this->resource['user_package']
                ? new UserPacakgeResource($this->resource['user_package'])
                : null,
            'services_count'        => $this->resource['services_count'],
            'provider_visits_count' => $this->resource['provider_visits_count'],
        ];
    }
}
