<?php

namespace App\Http\Controllers\Api\Backage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Package\PackageResource;
use App\Models\Package;
use App\Traits\ApiResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class BackageFeatureController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $user = $this->resolveUserFromToken();

        $query = Package::with('package_features');

        // Only exclude the free plan when logged in
        if ($user) {
            $query->where('price', '>', 0); // adjust to your actual "free" indicator
        }

        $packages = $query->get();

        // Determine the user's currently active package (if any)
        $activePackageId = $user?->package?->package_id;

        $packages->each(function ($package) use ($activePackageId) {
            $package->selected = ($activePackageId && $package->id === $activePackageId) ? 1 : 0;
        });

        return $this->successResponse(
            PackageResource::collection($packages),
            "all list packages"
        );
    }

    /**
     * Try to resolve the authenticated user from the JWT token if present.
     * Returns null for guests instead of throwing.
     */
    private function resolveUserFromToken()
    {
        try {
            if (!request()->bearerToken()) {
                return null;
            }

            return JWTAuth::parseToken()->authenticate() ?: null;
        } catch (TokenExpiredException | TokenInvalidException | JWTException $e) {
            return null;
        }
    }
}
