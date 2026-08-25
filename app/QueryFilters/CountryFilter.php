<?php

namespace App\QueryFilters;

use Closure;

class CountryFilter
{
    public function handle($query, Closure $next)
    {
        if (!request()->filled('country_id')) {
            return $next($query);
        }

        $builder = $next($query);

        $countryIds = request('country_id');
        $countryIds = is_array($countryIds) ? $countryIds : [$countryIds];

        return $builder->whereHas('user', function ($q) use ($countryIds) {
            $q->where('coverage_type', 'all_areas')
                ->orWhereHas('cities', function ($cq) use ($countryIds) {
                    $cq->whereIn('cities.country_id', $countryIds);
                });
        });
    }
}
