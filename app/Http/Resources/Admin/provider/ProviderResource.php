<?php

namespace App\Http\Resources\Admin\provider;

use App\Http\Resources\Admin\Branch\BranchResource;
use App\Http\Resources\Admin\MyCertificate\MyCertificateResource;
use App\Http\Resources\Admin\Project\ProjectResource;
use App\Http\Resources\Admin\Service\ServiceResource;
use App\Http\Resources\Admin\UserPackage\UserPacakgeResource;
use App\Http\Resources\Admin\verification\verificationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'email'           => $this->email,
            'phone'           => $this->phone,
            'user_name'       => $this->user_name,
            'image'           => $this->image
                ? url(str_replace('/storage/app/public', '/storage', $this->image))
                : null,
            'country_code'    => $this->country_code,
            'is_active'       => $this->is_active,
            'role'            => $this->role,
            'city_id'         => $this->city_id,
            'info'            => $this->info,
            'last_login_at'   => $this->last_login_at,
            'created_at'      => $this->created_at,
            'services_count'  => $this->services_count ?? 0,
            'reviews_count'   => $this->reviews_count ?? 0,
            'package_name'    => $this->package?->package?->name ?? null,
            'services' => ServiceResource::collection($this->whenLoaded('services')),
            'UserContact' => $this->whenLoaded('UserContact'),
            'projects' => ProjectResource::collection($this->whenLoaded('projects')),
            'certificates' => MyCertificateResource::collection($this->whenLoaded('certificates')),
            'my-packages' => UserPacakgeResource::collection($this->whenLoaded('Allpackage')),
            'my-branches' => BranchResource::collection($this->whenLoaded('branches')),
            'verification' => verificationResource::collection($this->whenLoaded('verification')),


        ];
    }
}
