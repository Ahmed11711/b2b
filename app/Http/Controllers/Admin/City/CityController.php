<?php

namespace App\Http\Controllers\Admin\City;

use App\Repositories\City\CityRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\City\CityStoreRequest;
use App\Http\Requests\Admin\City\CityUpdateRequest;
use App\Http\Resources\Admin\City\CityResource;

class CityController extends BaseController
{
    public function __construct(CityRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'City'
        );

        $this->storeRequestClass = CityStoreRequest::class;
        $this->updateRequestClass = CityUpdateRequest::class;
        $this->resourceClass = CityResource::class;
    }
}
