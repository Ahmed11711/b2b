<?php

namespace App\Http\Controllers\Admin\Service;

use App\Repositories\Service\ServiceRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Service\ServiceStoreRequest;
use App\Http\Requests\Admin\Service\ServiceUpdateRequest;
use App\Http\Resources\Admin\Service\ServiceResource;

class ServiceController extends BaseController
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
        $this->hasGallery = true;
    }
    protected function applyScoping($query)
    {
        $query = parent::applyScoping($query);

        return $query->withCount('visits');
    }

    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'reviews',
            'visits',

        ]);
    }
}
