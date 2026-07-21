<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Http\Resources\Admin\Category\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __construct(CategoryRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Category',
            fileFields: ['image']
        );

        $this->storeRequestClass = CategoryStoreRequest::class;
        $this->updateRequestClass = CategoryUpdateRequest::class;
        $this->resourceClass = CategoryResource::class;
    }

    /**
     */
    protected function beforeStore(array $data, Request $request): array
    {
        if (!empty($data['sort_order'])) {
            Category::where('sort_order', '>=', $data['sort_order'])
                ->increment('sort_order');
        } else {
            $data['sort_order'] = (Category::max('sort_order') ?? 0) + 1;
        }

        return $data;
    }


    protected function beforeUpdate(array $data, $existingRecord, Request $request): array
    {
        if (isset($data['sort_order']) && $data['sort_order'] != $existingRecord->sort_order) {
            $old = $existingRecord->sort_order;
            $new = $data['sort_order'];

            if ($new > $old) {
                Category::whereBetween('sort_order', [$old + 1, $new])
                    ->where('id', '!=', $existingRecord->id)
                    ->decrement('sort_order');
            } else {
                Category::whereBetween('sort_order', [$new, $old - 1])
                    ->where('id', '!=', $existingRecord->id)
                    ->increment('sort_order');
            }
        }

        return $data;
    }
}
