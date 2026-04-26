<?php

namespace App\Http\Controllers\Admin\Ads;

use App\Repositories\Ads\AdsRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Ads\AdsStoreRequest;
use App\Http\Requests\Admin\Ads\AdsUpdateRequest;
use App\Http\Resources\Admin\Ads\AdsResource;

class AdsController extends BaseController
{
    public function __construct(AdsRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Ads',
            fileFields: ['image']
        );

        $this->storeRequestClass = AdsStoreRequest::class;
        $this->updateRequestClass = AdsUpdateRequest::class;
        $this->resourceClass = AdsResource::class;
        $this->withRelationships = ['category'];
    }
}
