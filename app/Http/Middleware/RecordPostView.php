<?php

namespace App\Http\Middleware;

use App\Models\PostView;
use App\Services\IpLocationService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordPostView
{
    public function __construct(protected IpLocationService $ipLocationService) {}

    /**
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    /**
     */
    public function terminate(Request $request, Response $response): void
    {
        if (!$response->isSuccessful()) {
            return;
        }

        $postId = $request->route('id');

        if (!$postId) {
            return;
        }

        $ip = $request->ip();
        $userId = $request->user()?->id;

        $recentView = PostView::where('post_id', $postId)
            ->where(function ($query) use ($userId, $ip) {
                $userId
                    ? $query->where('user_id', $userId)
                    : $query->where('ip_address', $ip);
            })
            ->where('created_at', '>=', now()->subHour())
            ->exists();

        if ($recentView) {
            return;
        }

        $location = $this->ipLocationService->getLocationFromIp($ip);

        PostView::create([
            'post_id'    => $postId,
            'user_id'    => $userId,
            'ip_address' => $ip,
            'city'       => $location['city'],
            'country'    => $location['country'],
        ]);
    }
}
