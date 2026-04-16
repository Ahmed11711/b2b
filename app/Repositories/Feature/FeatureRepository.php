<?php

namespace App\Repositories\Feature;

use App\Repositories\Feature\FeatureRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Feature;

/**
 * Class FeatureRepository
 * @package App\Repositories\Feature
 */
class FeatureRepository extends BaseRepository implements FeatureRepositoryInterface
{
    /**
     * FeatureRepository constructor.
     *
     * @param Feature $model
     */
    public function __construct(Feature $model)
    {
        parent::__construct($model);
    }
}