<?php

namespace App\Http\Controllers\Api\Service;

use \Illuminate\Http\Request;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\ServiceStoreRequest;
use App\Http\Requests\Admin\Service\ServiceUpdateRequest;
use App\Http\Resources\Admin\Service\ServiceResource;
use App\Repositories\Service\ServiceRepositoryInterface;

class ServiceApiController extends BaseController
{
    public function __construct(ServiceRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Service',
            fileFields: ['image'],
        );

        $this->storeRequestClass = ServiceStoreRequest::class;
        $this->updateRequestClass = ServiceUpdateRequest::class;
        $this->resourceClass = ServiceResource::class;
    }

    protected function beforeStore(array $data, Request $request): array
    {
        return $data;
    }
}
