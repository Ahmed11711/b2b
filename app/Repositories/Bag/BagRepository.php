<?php

namespace App\Repositories\Bag;

use App\Repositories\Bag\BagRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Bag;

/**
 * Class BagRepository
 * @package App\Repositories\Bag
 */
class BagRepository extends BaseRepository implements BagRepositoryInterface
{
    /**
     * BagRepository constructor.
     *
     * @param Bag $model
     */
    public function __construct(Bag $model)
    {
        parent::__construct($model);
    }
}