<?php

namespace App\Http\Controllers\Admin\BagItems;

use App\Repositories\BagItems\BagItemsRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\BagItems\BagItemsStoreRequest;
use App\Http\Requests\Admin\BagItems\BagItemsUpdateRequest;
use App\Http\Resources\Admin\BagItems\BagItemsResource;

class BagItemsController extends BaseController
{
    public function __construct(BagItemsRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'BagItems',
            fileFields: ['image']
        );

        $this->storeRequestClass = BagItemsStoreRequest::class;
        $this->updateRequestClass = BagItemsUpdateRequest::class;
        $this->resourceClass = BagItemsResource::class;
    }
}
