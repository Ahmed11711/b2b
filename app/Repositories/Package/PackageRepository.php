<?php

namespace App\Repositories\Package;

use App\Repositories\Package\PackageRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Package;

/**
 * Class PackageRepository
 * @package App\Repositories\Package
 */
class PackageRepository extends BaseRepository implements PackageRepositoryInterface
{
    /**
     * PackageRepository constructor.
     *
     * @param Package $model
     */
    public function __construct(Package $model)
    {
        parent::__construct($model);
    }
}