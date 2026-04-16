<?php

namespace App\Repositories\BagsCategory;

use App\Repositories\BagsCategory\BagsCategoryRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\BagsCategory;

/**
 * Class BagsCategoryRepository
 * @package App\Repositories\BagsCategory
 */
class BagsCategoryRepository extends BaseRepository implements BagsCategoryRepositoryInterface
{
    /**
     * BagsCategoryRepository constructor.
     *
     * @param BagsCategory $model
     */
    public function __construct(BagsCategory $model)
    {
        parent::__construct($model);
    }
}