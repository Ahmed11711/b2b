<?php

namespace App\Http\Controllers\Admin\MyCertificate;

use \Illuminate\Http\Request;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\MyCertificate\MyCertificateStoreRequest;
use App\Http\Requests\Admin\MyCertificate\MyCertificateUpdateRequest;
use App\Http\Resources\Admin\MyCertificate\MyCertificateResource;
use App\Repositories\MyCertificate\MyCertificateRepositoryInterface;

class MyCertificateController extends BaseController
{
    public function __construct(MyCertificateRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'MyCertificate',
            fileFields: ['image']
        );

        $this->storeRequestClass = MyCertificateStoreRequest::class;
        $this->updateRequestClass = MyCertificateUpdateRequest::class;
        $this->resourceClass = MyCertificateResource::class;
        $this->isUserBound        = true;
    }
    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = $request->get('user_id');
        return $data;
    }
}
