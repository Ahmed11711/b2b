<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\ServiceStoreRequest;
use App\Http\Requests\Admin\Service\ServiceUpdateRequest;
use App\Http\Resources\Admin\Service\ServiceResource;
use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;

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
        $this->withRelationships = ['gallery'];
    }
    protected function getIndexRelationships(): array
    {
        return ['category'];
    }

    protected function getShowRelationships(): array
    {
        return ['gallery', 'user', 'city', 'category'];
    }

    protected function applyScoping($query)
    {
        return $query->where('user_id', 10)->orderBy('created_at', 'desc');
    }
}
