<?php

namespace App\Http\Controllers\Api\Dashboard;

use \App\Models\UserPackage;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\DashboardResource;
use App\Models\providerVisit;
use App\Models\Service;
use App\Models\UserPacakges;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth('api')->id();
        $user   = auth('api')->user();

        $userPackage   = UserPacakges::with('package')->where('user_id', $userId)->where('active', true)->first();
        $service       = Service::where('user_id', $userId)->where('is_active', true)->count();
        $providerVisit = providerVisit::where('provider_id', $userId)->count();

        return response()->json([
            'success' => true,
            'status'  => 200,
            'data'    => new DashboardResource([
                'user'                  => $user, // ← مررها
                'user_package'          => $userPackage,
                'services_count'        => $service,
                'provider_visits_count' => $providerVisit,
            ]),
        ]);
    }
}
