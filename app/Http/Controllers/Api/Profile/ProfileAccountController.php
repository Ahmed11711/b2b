<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Http\Requests\Api\ProfileAccount\ProfileAccountRequest;
use App\Http\Resources\Admin\User\UserResource;
use App\Http\Resources\Api\ProfileAccount\ProfileAccountResource;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileAccountController extends BaseController
{
    public function __construct(UserRepositoryInterface $repository, public CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();
        $this->initService(
            repository: $repository,
            collectionName: 'User',
            fileFields: ['image']
        );


        $this->storeRequestClass = ProfileAccountRequest::class;
        $this->updateRequestClass = ProfileAccountRequest::class;
        $this->resourceClass = ProfileAccountResource::class;
        $this->withRelationships = ['categories'];
    }




    public function show(int $id = 0): JsonResponse
    {
        $userId = auth('api')->id();

        $record = $this->repository->query()
            ->with($this->getShowRelationships())
            ->find($userId);

        if (!$record) {
            return $this->errorResponse("User not found", 404);
        }

        $record->all_categories_with_selection = $this->categoryRepository->getAllCategoriesForUser($userId);

        return $this->successResponse(
            new $this->resourceClass($record),
            'Record retrieved successfully'
        );
    }

    public function update(Request $request, int $id = 0): JsonResponse
    {
        $userId = $request->get('user_id');
        return parent::update($request, $userId);
    }

    protected function beforeUpdate(array $data, $existingRecord, Request $request): array
    {
        unset($data['categories']);
        return $data;
    }

    protected function afterUpdate($updatedRecord, $oldRecord, Request $request): void
    {
        if ($request->has('categories')) {
            $categories = $request->input('categories');

            $this->categoryRepository->syncUserCategories($updatedRecord->id, $categories);

            $updatedRecord->all_categories_with_selection = $this->categoryRepository->getAllCategoriesForUser($updatedRecord->id);

            Log::info("Categories synced and reloaded for user: " . $updatedRecord->id);
        }
    }
}
