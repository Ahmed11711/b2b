<?php

namespace App\Http\Controllers\Api\MyCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\SyancCaegoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class MyCategoryController extends Controller
{
    use ApiResponseTrait;
    public function __construct(public CategoryRepositoryInterface $categoryRepository) {}
    public function index(Request $request)
    {
        $userId = $request->get('auth_user_id');
        $categories = $this->categoryRepository->getAllCategoriesForUser($userId);
        return $this->successResponse($categories, "My Category");
    }
    public function store(SyancCaegoryRequest $request)
    {
        $data = $request->validated();

        $userId = $request->get('auth_user_id');

        $this->categoryRepository->syncUserCategories($userId, $data['categories']);

        return $this->messageResponse("Categories updated successfully");
    }
}
