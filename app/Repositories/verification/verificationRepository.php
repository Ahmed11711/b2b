<?php

namespace App\Repositories\verification;

use App\Repositories\verification\verificationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\verification;

/**
 * Class verificationRepository
 * @package App\Repositories\verification
 */
class verificationRepository extends BaseRepository implements verificationRepositoryInterface
{
    /**
     * verificationRepository constructor.
     *
     * @param verification $model
     */
    public function __construct(verification $model)
    {
        parent::__construct($model);
    }
}