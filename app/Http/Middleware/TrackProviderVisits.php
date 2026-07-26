<?php

namespace App\Http\Middleware;

use App\Models\ProviderVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;
use Stevebauman\Location\Facades\Location;

class TrackProviderVisits
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        if ($response->getStatusCode() === 200) {
            try {
                $agent = new Agent();
                $visitorId = auth('api')->id();

                $routeName  = $request->route()?->getName();
                $providerId = null;
                $serviceId  = null;
                $projectId  = null;

                if ($routeName === 'project.show') {
                    // زيارة خاصة بمشروع
                    $projectId = $request->route('id');
                    if (!$projectId) return;
                } else {
                    // الحالة الأصلية: provider / service
                    $providerId = $request->route('id');
                    $serviceId  = $request->route('service_id') ?? $request->input('service_id');

                    if (!$providerId && $serviceId) {
                        $service = \App\Models\Service::find($serviceId);
                        if (!$service) return;
                        $providerId = $service->user_id;
                    }

                    if (!$providerId) return;
                }

                $alreadyVisited = ProviderVisit::when($providerId, function ($q) use ($providerId) {
                    return $q->where('provider_id', $providerId);
                })
                    ->when($serviceId, function ($q) use ($serviceId) {
                        return $q->where('service_id', $serviceId);
                    })
                    ->when($projectId, function ($q) use ($projectId) {
                        return $q->where('project_id', $projectId);
                    })
                    ->where(function ($q) use ($visitorId, $request) {
                        if ($visitorId) {
                            $q->where('visitor_id', $visitorId);
                        } else {
                            $q->where('ip_address', $request->ip());
                        }
                    })
                    ->where('visited_at', '>', now()->subDay())
                    ->exists();

                if (!$alreadyVisited) {
                    $country = $request->header('cf-ipcountry') ?? 'N/A';
                    $city    = 'N/A';

                    try {
                        $position = Location::get($request->ip());

                        if ($position) {
                            $country = $position->countryName ?? $country;
                            $city    = $position->cityName ?? $city;
                        }
                    } catch (\Exception $e) {
                        Log::error("Location Detection Error: " . $e->getMessage());
                    }

                    ProviderVisit::create([
                        'visitor_id'  => $visitorId,
                        'provider_id' => $providerId,
                        'service_id'  => $serviceId,
                        'project_id'  => $projectId,
                        'ip_address'  => $request->ip(),
                        'country'     => $country,
                        'city'        => $city,
                        'device_type' => $agent->isMobile() ? 'Mobile' : 'Desktop',
                        'os'          => $agent->platform(),
                        'browser'     => $agent->browser(),
                        'visited_at'  => now(),
                    ]);
                }
            } catch (\Exception $e) {
                Log::error("Tracking Middleware Error: " . $e->getMessage());
            }
        }
    }
}
