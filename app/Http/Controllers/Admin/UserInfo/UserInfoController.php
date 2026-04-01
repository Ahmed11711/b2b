<?php

namespace App\Http\Controllers\Admin\UserInfo;

use App\Repositories\UserInfo\UserInfoRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\UserInfo\UserInfoStoreRequest;
use App\Http\Requests\Admin\UserInfo\UserInfoUpdateRequest;
use App\Http\Resources\Admin\UserInfo\UserInfoResource;

class UserInfoController extends BaseController
{
    public function __construct(UserInfoRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'UserInfo'
        );

        $this->storeRequestClass = UserInfoStoreRequest::class;
        $this->updateRequestClass = UserInfoUpdateRequest::class;
        $this->resourceClass = UserInfoResource::class;
    }
}
