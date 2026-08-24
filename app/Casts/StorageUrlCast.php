<?php
// app/Casts/StorageUrlCast.php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class StorageUrlCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        if (!$value) return null;

        if (str_starts_with($value, 'http')) {
            return $this->clean($value);
        }

        return $this->clean(asset(ltrim($value, '/')));
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        return $value;
    }

    private function clean(string $url): string
    {
        // فصل البروتوكول عن الباقي عشان الـ // بتاعة https:// متتأثرش
        $parts = explode('://', $url, 2);

        if (count($parts) === 2) {
            [$scheme, $rest] = $parts;

            // شيل أي /api زيادة في الأول
            $rest = preg_replace('#^([^/]+)/api/#', '$1/', $rest);

            // شيل أي // مكررة في الباقي
            $rest = preg_replace('#(?<!:)//+#', '/', $rest);

            return $scheme . '://' . $rest;
        }

        return $url;
    }
}
