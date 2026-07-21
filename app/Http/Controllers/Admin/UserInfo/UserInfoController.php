<?php

namespace App\Http\Controllers\Admin\UserInfo;

use App\Repositories\UserInfo\UserInfoRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\UserInfo\UserInfoStoreRequest;
use App\Http\Requests\Admin\UserInfo\UserInfoUpdateRequest;
use App\Http\Resources\Admin\UserInfo\UserInfoResource;
use Illuminate\Http\Request;

class UserInfoController extends BaseController
{
    protected bool $isUserBound = true;

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

    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = auth('api')->id();

        return $data;
    }
}
