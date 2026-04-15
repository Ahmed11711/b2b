<?php

namespace App\Http\Controllers\Admin\verification;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\verification\verificationStoreRequest;
use App\Http\Requests\Admin\verification\verificationUpdateRequest;
use App\Http\Resources\Admin\verification\verificationResource;
use App\Repositories\verification\verificationRepositoryInterface;
use Illuminate\Http\Request;

class verificationController extends BaseController
{
    public function __construct(verificationRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'verification',
            fileFields: ['id_card_front', 'id_card_back', 'commercial_register', 'tax_card']

        );

        $this->storeRequestClass = verificationStoreRequest::class;
        $this->updateRequestClass = verificationUpdateRequest::class;
        $this->resourceClass = verificationResource::class;
        $this->isUserBound        = true;
    }
    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = auth('api')->id();
        $data['status']  = 'pending';
        return $data;
    }
}
