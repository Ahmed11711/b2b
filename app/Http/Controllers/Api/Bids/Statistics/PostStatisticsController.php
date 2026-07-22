<?php

namespace App\Http\Controllers\Api\Bids\Statistics;

use App\Http\Controllers\Controller;
use App\Models\bids;
use App\Models\Posts;
use App\Models\PostView;
use Illuminate\Http\Request;

class PostStatisticsController extends Controller
{
    public function show(Request $request, $postId)
    {
        $post = Posts::findOrFail($postId);

        $totalViews = PostView::where('post_id', $postId)->count();
        $totalBids  = bids::where('post_id', $postId)->count();

        $viewsByCity = $this->getPercentageByCity(PostView::class, $postId, $totalViews);
        $bidsByCity  = $this->getPercentageByCity(bids::class, $postId, $totalBids);

        return response()->json([
            'total_views'   => $totalViews,
            'total_bids'    => $totalBids,
            'views_by_city' => $viewsByCity,
            'bids_by_city'  => $bidsByCity,
        ]);
    }

    private function getPercentageByCity(string $model, $postId, int $total): array
    {
        if ($total === 0) {
            return [];
        }

        $grouped = $model::where('post_id', $postId)
            ->whereNotNull('city')
            ->selectRaw('city, COUNT(*) as count')
            ->groupBy('city')
            ->orderByDesc('count')
            ->get();

        return $grouped->map(function ($row) use ($total) {
            return [
                'city'       => $row->city,
                'count'      => $row->count,
                'percentage' => round(($row->count / $total) * 100),
            ];
        })->toArray();
    }
}
