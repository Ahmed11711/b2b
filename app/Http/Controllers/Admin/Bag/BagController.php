<?php

namespace App\Http\Controllers\Admin\Bag;

use App\Repositories\Bag\BagRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Bag\BagStoreRequest;
use App\Http\Requests\Admin\Bag\BagUpdateRequest;
use App\Http\Resources\Admin\Bag\BagResource;

class BagController extends BaseController
{
    public function __construct(BagRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Bag',
            fileFields: ['image', 'icon']
        );

        $this->storeRequestClass = BagStoreRequest::class;
        $this->updateRequestClass = BagUpdateRequest::class;
        $this->resourceClass = BagResource::class;
    }
    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'bagCategory'
        ]);
    }
}
