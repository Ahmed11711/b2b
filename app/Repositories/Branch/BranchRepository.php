<?php

namespace App\Repositories\Branch;

use App\Repositories\Branch\BranchRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Branch;

/**
 * Class BranchRepository
 * @package App\Repositories\Branch
 */
class BranchRepository extends BaseRepository implements BranchRepositoryInterface
{
    /**
     * BranchRepository constructor.
     *
     * @param Branch $model
     */
    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }
}