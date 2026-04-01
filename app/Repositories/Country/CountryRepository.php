<?php

namespace App\Repositories\Country;

use App\Repositories\Country\CountryRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Country;

/**
 * Class CountryRepository
 * @package App\Repositories\Country
 */
class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    /**
     * CountryRepository constructor.
     *
     * @param Country $model
     */
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}