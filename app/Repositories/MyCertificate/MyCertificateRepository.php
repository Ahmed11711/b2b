<?php

namespace App\Repositories\MyCertificate;

use App\Repositories\MyCertificate\MyCertificateRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\MyCertificate;

/**
 * Class MyCertificateRepository
 * @package App\Repositories\MyCertificate
 */
class MyCertificateRepository extends BaseRepository implements MyCertificateRepositoryInterface
{
    /**
     * MyCertificateRepository constructor.
     *
     * @param MyCertificate $model
     */
    public function __construct(MyCertificate $model)
    {
        parent::__construct($model);
    }
}