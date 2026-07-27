<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\Stats\ProviderStatsService;
use Illuminate\Http\JsonResponse;

class ServiceStatsController extends Controller
{
    public function __construct(protected ProviderStatsService $statsService) {}

    public function show(int $id): JsonResponse
    {
        $service = Service::findOrFail($id);

        $stats = $this->statsService->getStats('service_id', $service->id);

        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Stats retrieved successfully',
            'data'    => $stats,
        ]);
    }
}
