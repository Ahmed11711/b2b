<?php

namespace App\Http\Controllers\Api\Backage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Package\PackageResource;
use App\Models\Package;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BackageFeatureController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $packages = Package::with('package_features')->get();
        return $this->successResponse(
            PackageResource::collection($packages),
            "all list packages"
        );
    }
}
