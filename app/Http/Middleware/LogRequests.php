<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    /**
     * الحقول اللي مش عايزين نلوجها زي كدا عشان حساسة (passwords, tokens..)
     */
    protected array $hiddenFields = [
        'password',
        'password_confirmation',
        'token',
        'api_token',
        'access_token',
        'refresh_token',
        'secret',
        'credit_card',
        'cvv',
    ];

    /**
     * أقصى عدد حروف هيتلوج من الـ response body (عشان الـ log ميبقاش ضخم جدًا)
     */
    protected int $maxResponseLength = 2000;

    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        // معرف فريد لكل ريكوست عشان تربط بين اللوج بتاع الـ request والـ response بسهولة
        $requestId = (string) Str::uuid();
        $request->attributes->set('request_id', $requestId);

        $this->logRequest($request, $requestId);

        /** @var Response $response */
        $response = $next($request);

        $durationMs = round((microtime(true) - $startTime) * 1000, 2);

        $this->logResponse($request, $response, $requestId, $durationMs);

        return $response;
    }

    protected function logRequest(Request $request, string $requestId): void
    {
        Log::info("➡️ Incoming Request [{$requestId}]", [
            'method'      => $request->method(),
            'url'         => $request->fullUrl(),
            'ip'          => $request->ip(),
            'user_agent'  => $request->userAgent(),
            'user_id'     => optional($request->user())->id,
            'headers'     => $this->filterHeaders($request->headers->all()),
            'body'        => $this->filterFields($request->all()),
        ]);
    }

    protected function logResponse(Request $request, Response $response, string $requestId, float $durationMs): void
    {
        $statusCode = $response->getStatusCode();
        $level = $statusCode >= 500 ? 'error' : ($statusCode >= 400 ? 'warning' : 'info');

        $content = $response->getContent();

        // نحاول نفك الـ JSON عشان يظهر في اللوج بشكل مقروء، ولو فشل نعرضه كـ string عادي
        $decoded = json_decode($content, true);
        $responseBody = json_last_error() === JSON_ERROR_NONE ? $decoded : $content;

        // نقص حجم الـ response لو كبير جدًا عشان ميتقلش أداء اللوج
        if (is_string($responseBody) && strlen($responseBody) > $this->maxResponseLength) {
            $responseBody = substr($responseBody, 0, $this->maxResponseLength) . '... [TRUNCATED]';
        }

        Log::{$level}("⬅️ Outgoing Response [{$requestId}]", [
            'method'       => $request->method(),
            'url'          => $request->fullUrl(),
            'status'       => $statusCode,
            'duration_ms'  => $durationMs,
            'response'     => $responseBody,
        ]);
    }

    /**
     * يشيل أي حقول حساسة قبل ما يتلوج الـ body
     */
    protected function filterFields(array $data): array
    {
        foreach ($data as $key => $value) {
            if (in_array(strtolower($key), $this->hiddenFields, true)) {
                $data[$key] = '***HIDDEN***';
            } elseif (is_array($value)) {
                $data[$key] = $this->filterFields($value);
            }
        }

        return $data;
    }

    /**
     * يشيل الـ headers الحساسة زي Authorization و Cookie
     */
    protected function filterHeaders(array $headers): array
    {
        $hiddenHeaders = ['authorization', 'cookie', 'x-api-key'];

        foreach ($headers as $key => $value) {
            if (in_array(strtolower($key), $hiddenHeaders, true)) {
                $headers[$key] = ['***HIDDEN***'];
            }
        }

        return $headers;
    }
}
