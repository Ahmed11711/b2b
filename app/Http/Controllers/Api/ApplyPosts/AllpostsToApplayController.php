<?php

namespace App\Http\Controllers\Api\ApplyPosts;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\PostsStoreRequest;
use App\Http\Requests\Admin\Posts\PostsUpdateRequest;
use App\Http\Resources\Admin\Posts\PostsResource;
use App\Repositories\Posts\PostsRepositoryInterface;
use Illuminate\Http\Request;

class AllpostsToApplayController extends BaseController
{
    public function __construct(PostsRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Posts',
            fileFields: ['image']
        );

        $this->storeRequestClass = PostsStoreRequest::class;
        $this->updateRequestClass = PostsUpdateRequest::class;
        $this->resourceClass = PostsResource::class;
        $this->hasGallery         = true;

        $this->withRelationships = [
            'user:id,name,email,image,coverage_type',
            'user.cities',
            'contacts',
            'userBid',
        ];
    }
    protected function applyScoping($query)
    {
        if (request()->isMethod('get')) {
            request()->query->remove('user_id');
            request()->request->remove('user_id');

            $authUserId = auth('api')->id();
            $categoryIds = auth('api')->user()->categories()->pluck('category_id');

            return $query
                ->where('is_active', true)
                ->whereIn('category_id', $categoryIds)
                ->where('user_id', '!=', $authUserId);
            // ✅ اتشال: ->whereDoesntHave('bids', function ($q) use ($authUserId) { ... })
        }

        return $query->where('user_id', auth('api')->id());
    }

    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'gallery',
            'contacts',
        ]);
    }
}
