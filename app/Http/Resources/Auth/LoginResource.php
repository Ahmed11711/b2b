<?php

namespace App\Http\Resources\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email ?? null,
            'phone'             => $this->phone ?? null,
            'user_name'         => $this->user_name,
            'whtsapp'           => $this->whtsapp, // Fixed typo from 'whatsapp' if that's your DB column name
            'country_code'      => $this->country_code,
            'image'             => $this->image,
            'is_active'         => (int) $this->is_active,
            'is_verified'       => !is_null($this->email_verified_at),
            'role'              => $this->role,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'profile_completion' => $this->getProfileCompletion($this->resource),
            'package'           => $this->getPackageInfo($this->resource),
        ];
    }

    public function getProfileCompletion(User $user): array
    {
        $fields = [
            'name'         => $user->name,
            'email'        => $user->email,
            'phone'        => $user->phone,
            'user_name'    => $user->user_name,
            'whtsapp'      => $user->whtsapp,
            'country_code' => $user->country_code,
            'is_verified'  => $user->email_verified_at,
        ];

        $completed = array_filter($fields, fn($val) => !is_null($val) && $val !== '' && $val !== false);
        $percentage = (int) round((count($completed) / count($fields)) * 100);

        return [
            'percentage'       => $percentage,
            'completed_fields' => array_keys($completed),
            'missing_fields'   => array_keys(array_diff_key($fields, $completed)),
        ];
    }

    public function getPackageInfo(User $user): ?array
    {
        $subscription = $user->activeUserPackage;

        if (!$subscription) {
            return null;
        }

        $package = $subscription->package;

        $endsAt        = $subscription->ends_at;
        $daysRemaining = $endsAt ? max(0, now()->diffInDays($endsAt, false)) : 0;
        $isExpired     = $endsAt ? now()->greaterThan($endsAt) : false;

        return [
            'package_id'     => $package->id,
            'name'           => $package->name,
            'is_free'        => (bool) $package->is_free,
            'starts_at'      => $subscription->starts_at,
            'ends_at'        => $endsAt,
            'days_remaining' => $isExpired ? 0 : $daysRemaining,
            'is_expired'     => $isExpired,
        ];
    }
}
