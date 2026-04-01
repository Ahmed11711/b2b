<?php

namespace App\Repositories\Service;

use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Service;

/**
 * Class ServiceRepository
 * @package App\Repositories\Service
 */
class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    /**
     * ServiceRepository constructor.
     *
     * @param Service $model
     */
    public function __construct(Service $model)
    {
        parent::__construct($model);
    }
}