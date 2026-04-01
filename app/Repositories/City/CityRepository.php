<?php

namespace App\Repositories\City;

use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\City;

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
}