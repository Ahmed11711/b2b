<?php

namespace App\Repositories\Posts;

use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Posts;

/**
 * Class PostsRepository
 * @package App\Repositories\Posts
 */
class PostsRepository extends BaseRepository implements PostsRepositoryInterface
{
    /**
     * PostsRepository constructor.
     *
     * @param Posts $model
     */
    public function __construct(Posts $model)
    {
        parent::__construct($model);
    }
}