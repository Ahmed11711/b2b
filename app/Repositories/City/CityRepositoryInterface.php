<?php

namespace App\Repositories\City;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

/**
 * Interface CityRepositoryInterface
 * @package App\Repositories\City
 */
interface CityRepositoryInterface extends BaseRepositoryInterface
{
    public function query();

    public function syncUserCities(int $userId, array $cityIds = []): void;

    public function getAllCitiesForUser(int $userId);
}
