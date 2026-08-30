<?php

namespace App\Http\Controllers\Api\ApplyPosts;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Posts\PostsStoreRequest;
use App\Http\Requests\Admin\Posts\PostsUpdateRequest;
use App\Http\Resources\Admin\Posts\PostsResource;
use App\Repositories\Posts\PostsRepositoryInterface;

class MyAppliedPostsController extends BaseController
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
        ];
    }

    protected function applyScoping($query)
    {
        $authUserId = auth('api')->id();

        return $query->whereHas('bids', function ($q) use ($authUserId) {
            $q->where('user_id', $authUserId);
        });
    }

    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'gallery',
            'contacts',
        ]);
    }
}
