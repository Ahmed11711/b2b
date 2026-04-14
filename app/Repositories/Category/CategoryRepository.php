<?php

namespace App\Repositories\Category;

use \App\Models\User;
use App\Models\Category;
use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryRepository
 * @package App\Repositories\Category
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getAllCategoriesForUser($userId)
    {
        return Category::addSelect([
            'is_selected' => DB::table('category_user')
                ->selectRaw('count(*)')
                ->whereColumn('category_id', 'categories.id')
                ->where('user_id', $userId)
        ])->get();
    }

    public function syncUserCategories(int $userId, array $categoryIds)
    {
        $user = User::findOrFail($userId);
        return $user->categories()->sync($categoryIds);
    }
}
