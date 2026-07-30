<?php

namespace App\QueryFilters;

use Closure;

class ColumnFilter
{
    public function handle($query, Closure $next)
    {
        $model = $query->getModel();

        $filterable = property_exists($model, 'filterable') ? $model->filterable : [];

        if (!empty($filterable)) {
            $filters = request()->only($filterable);

            // لو اليوزر أدمن أو سوبر أدمن، متطبقش فلتر user_id التلقائي
            $authUser = request()->input('auth_user');
            if ($authUser && in_array($authUser->role, ['admin', 'super_admin'])) {
                unset($filters['user_id']);
            }

            foreach ($filters as $key => $value) {
                if ($value !== null && $value !== '') {
                    if (is_array($value)) {
                        $query->whereIn($key, $value);
                    } else {
                        $query->where($key, $value);
                    }
                }
            }
        }

        return $next($query);
    }
}
