<?php

namespace App\Repositories\Project;

use App\Repositories\Project\ProjectRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Project;

/**
 * Class ProjectRepository
 * @package App\Repositories\Project
 */
class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    /**
     * ProjectRepository constructor.
     *
     * @param Project $model
     */
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }
}