<?php

namespace App\Http\Controllers\Api\Backage;

use App\Http\Controllers\Controller;
use App\Models\UserPacakgesFeatures;
use App\Models\UserPackageFeature;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PackageUsageController extends Controller
{
    use ApiResponseTrait;

    public function currentUsage(Request $request)
    {
        $userId = auth('api')->id();

        $features = UserPacakgesFeatures::with('packageFeature.feature')
            ->where('user_id', $userId)
            ->where('active', true)
            ->get();

        $data = $features->map(function ($item) {
            $used = $item->total_count - $item->remaining_count;
            $percentage = $item->total_count > 0
                ? round(($used / $item->total_count) * 100)
                : 0;

            return [
                'key'             => $item->packageFeature->feature->key ?? null,
                'label'           => $item->packageFeature->feature->lable ?? null,
                'total_count'     => $item->total_count,
                'remaining_count' => $item->remaining_count,
                'used_count'      => $used,
                'percentage'      => $percentage,
            ];
        });

        return $this->successResponse($data, 'Package usage fetched successfully');
    }
}
