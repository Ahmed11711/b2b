<?php

namespace App\Repositories\UserInfo;

use App\Repositories\UserInfo\UserInfoRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\UserInfo;

/**
 * Class UserInfoRepository
 * @package App\Repositories\UserInfo
 */
class UserInfoRepository extends BaseRepository implements UserInfoRepositoryInterface
{
    /**
     * UserInfoRepository constructor.
     *
     * @param UserInfo $model
     */
    public function __construct(UserInfo $model)
    {
        parent::__construct($model);
    }
}