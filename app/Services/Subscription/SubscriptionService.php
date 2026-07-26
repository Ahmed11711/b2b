<?php

namespace App\Services\Subscription;

use App\Models\Package;
use App\Models\UserPacakges;
use App\Models\UserPacakgesFeatures;
use Illuminate\Support\Facades\DB;

class SubscriptionService
{
    /**
     */
    public function subscribeUser(int $userId, int $packageId)
    {
        $package = Package::with('package_features')->findOrFail($packageId);

        return DB::transaction(function () use ($userId, $package) {

            $this->deactivateCurrentSubscriptions($userId);

            $endsAt = $package->is_free
                ? now()->addDays(15)
                : now()->addMonths($package->duration_months);

            $subscription = UserPacakges::create([
                'user_id'    => $userId,
                'package_id' => $package->id,
                'starts_at'  => now(),
                'ends_at'    => $endsAt,
                'active'     => true,
            ]);

            $this->assignFeaturesToUser($userId, $package);

            return $subscription;
        });
    }

    /**
     */
    protected function deactivateCurrentSubscriptions(int $userId)
    {
        UserPacakges::where('user_id', $userId)
            ->where('active', true)
            ->update(['active' => false]);

        UserPacakgesFeatures::where('user_id', $userId)
            ->where('active', true)
            ->update(['active' => false]);
    }

    /**
     */
    protected function assignFeaturesToUser(int $userId, Package $package)
    {
        $userFeatures = [];

        foreach ($package->package_features as $pf) {
            $userFeatures[] = [
                'user_id'            => $userId,
                'package_id'         => $package->id,
                'package_feature_id' => $pf->id,
                'total_count'        => $pf->value,
                'remaining_count'    => $pf->value,
                'active'             => true,
                'created_at'         => now(),
                'updated_at'         => now(),
            ];
        }

        if (!empty($userFeatures)) {
            UserPacakgesFeatures::insert($userFeatures);
        }
    }
}
