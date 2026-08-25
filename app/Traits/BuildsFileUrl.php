<?php

namespace App\Traits;

trait BuildsFileUrl
{

    protected function buildFileUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        $path = str_replace('/storage/app/public', '/storage', $path);
        $path = '/' . ltrim($path, '/');

        return rtrim(url('/api'), '/') . $path;
    }
}
