<?php

namespace App\QueryFilters;

use Closure;

class CategoryFilter
{
    public function handle($query, Closure $next)
    {
        if (!request()->filled('category_id')) {
            return $next($query);
        }

        $builder = $next($query);

        $categoryIds = request('category_id');
        $categoryIds = is_array($categoryIds) ? $categoryIds : [$categoryIds];

        return $builder->whereIn('category_id', $categoryIds);
        // أو لو many-to-many:
        // return $builder->whereHas('categories', fn($q) => $q->whereIn('categories.id', $categoryIds));
    }
}
