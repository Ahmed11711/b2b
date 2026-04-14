<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Repositories\Category
 */
interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllCategoriesForUser($userId);
    public function syncUserCategories(int $userId, array $categoryIds);
}
