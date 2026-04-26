<?php

namespace App\Repositories\UserPacakges;

use App\Repositories\UserPacakges\UserPacakgesRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\UserPacakges;

/**
 * Class UserPacakgesRepository
 * @package App\Repositories\UserPacakges
 */
class UserPacakgesRepository extends BaseRepository implements UserPacakgesRepositoryInterface
{
    /**
     * UserPacakgesRepository constructor.
     *
     * @param UserPacakges $model
     */
    public function __construct(UserPacakges $model)
    {
        parent::__construct($model);
    }
}