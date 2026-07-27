<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\Stats\ProviderStatsService;
use Illuminate\Http\JsonResponse;

class ProjectStatsController extends Controller
{
    public function __construct(protected ProviderStatsService $statsService) {}

    public function show(int $id): JsonResponse
    {
        $project = Project::findOrFail($id);

        $stats = $this->statsService->getStats('project_id', $project->id);

        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Stats retrieved successfully',
            'data'    => $stats,
        ]);
    }
}
