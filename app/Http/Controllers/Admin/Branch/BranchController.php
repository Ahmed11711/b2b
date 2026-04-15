<?php

namespace App\Http\Controllers\Admin\Branch;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Branch\BranchStoreRequest;
use App\Http\Requests\Admin\Branch\BranchUpdateRequest;
use App\Http\Resources\Admin\Branch\BranchResource;
use App\Repositories\Branch\BranchRepositoryInterface;
use \Illuminate\Http\Request;

class BranchController extends BaseController
{
    public function __construct(BranchRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Branch'
        );

        $this->storeRequestClass = BranchStoreRequest::class;
        $this->updateRequestClass = BranchUpdateRequest::class;
        $this->resourceClass = BranchResource::class;
        $this->isUserBound        = true;
    }
    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = $request->get('user_id');
        return $data;
    }
}
