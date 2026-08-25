<?php

namespace App\QueryFilters;

use Closure;

class UserCityFilter
{
    public function handle($query, Closure $next)
    {
        if (!request()->filled('city_id')) {
            return $next($query);
        }

        $builder = $next($query);

        $cityIds = request('city_id');
        $cityIds = is_array($cityIds) ? $cityIds : [$cityIds];

        return $builder->where(function ($q) use ($cityIds) {
            $q->where('coverage_type', 'all_areas')
                ->orWhereHas('cities', function ($cq) use ($cityIds) {
                    $cq->whereIn('cities.id', $cityIds);
                });
        });
    }
}
