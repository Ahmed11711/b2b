<?php

namespace App\Http\Controllers\Admin\BagsCategory;

use App\Repositories\BagsCategory\BagsCategoryRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\BagsCategory\BagsCategoryStoreRequest;
use App\Http\Requests\Admin\BagsCategory\BagsCategoryUpdateRequest;
use App\Http\Resources\Admin\BagsCategory\BagsCategoryResource;

class BagsCategoryController extends BaseController
{
    public function __construct(BagsCategoryRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'BagsCategory',
            fileFields: ['image']

        );

        $this->storeRequestClass = BagsCategoryStoreRequest::class;
        $this->updateRequestClass = BagsCategoryUpdateRequest::class;
        $this->resourceClass = BagsCategoryResource::class;
        $this->withRelationships = ['bag'];
    }
}
