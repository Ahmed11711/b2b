<?php

namespace App\Repositories\City;

use App\Models\City;
use App\Models\User;
use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\City\CityRepositoryInterface;

/**
 * Class CityRepository
 * @package App\Repositories\City
 */
class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    /**
     * CityRepository constructor.
     *
     * @param City $model
     */
    public function __construct(City $model)
    {
        parent::__construct($model);
    }
    public function query()
    {
        return City::query();
    }

    public function syncUserCities(int $userId, array $cityIds = []): void
    {
        $user = User::find($userId);

        if ($user) {
            $user->cities()->sync($cityIds);
        }
    }

    public function getAllCitiesForUser(int $userId)
    {
        $user = User::find($userId);

        // لو اليوزر مختار "كل المناطق" → كل المدن تبقى selected
        if ($user && $user->coverage_type === 'all_areas') {
            return City::all()->map(function ($city) {
                $city->is_selected = true;
                return $city;
            });
        }

        // لو "اونلاين" أو حاجة تانية غير specific_cities → مفيش حاجة selected
        if ($user && $user->coverage_type !== 'specific_cities') {
            return City::all()->map(function ($city) {
                $city->is_selected = false;
                return $city;
            });
        }

        // الحالة العادية: specific_cities
        $selectedCityIds = $user
            ?->cities()
            ->pluck('cities.id')
            ->toArray() ?? [];

        return City::all()->map(function ($city) use ($selectedCityIds) {
            $city->is_selected = in_array($city->id, $selectedCityIds);
            return $city;
        });
    }
}
