<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class IpLocationService
{
    public function getLocationFromIp(string $ip): array
    {
        // تجاهل الـ IPs المحلية وقت التطوير
        if (in_array($ip, ['127.0.0.1', '::1'])) {
            return ['city' => null, 'country' => null];
        }

        return Cache::remember("ip_location_{$ip}", now()->addDay(), function () use ($ip) {
            try {
                $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}", [
                    'fields' => 'status,country,city',
                ]);

                if ($response->successful() && $response->json('status') === 'success') {
                    return [
                        'city'    => $response->json('city'),
                        'country' => $response->json('country'),
                    ];
                }
            } catch (\Exception $e) {
                // لو فشل الطلب لأي سبب، متكسرش الصفحة
            }

            return ['city' => null, 'country' => null];
        });
    }
}
