<?php

namespace App\Repositories\Ads;

use App\Repositories\Ads\AdsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Ads;

/**
 * Class AdsRepository
 * @package App\Repositories\Ads
 */
class AdsRepository extends BaseRepository implements AdsRepositoryInterface
{
    /**
     * AdsRepository constructor.
     *
     * @param Ads $model
     */
    public function __construct(Ads $model)
    {
        parent::__construct($model);
    }
}