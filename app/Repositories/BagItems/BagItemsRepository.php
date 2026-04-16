<?php

namespace App\Repositories\BagItems;

use App\Repositories\BagItems\BagItemsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\BagItems;

/**
 * Class BagItemsRepository
 * @package App\Repositories\BagItems
 */
class BagItemsRepository extends BaseRepository implements BagItemsRepositoryInterface
{
    /**
     * BagItemsRepository constructor.
     *
     * @param BagItems $model
     */
    public function __construct(BagItems $model)
    {
        parent::__construct($model);
    }
}