<?php

namespace App\Http\Controllers\Admin\UserPacakges;

use App\Repositories\UserPacakges\UserPacakgesRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\UserPacakges\UserPacakgesStoreRequest;
use App\Http\Requests\Admin\UserPacakges\UserPacakgesUpdateRequest;
use App\Http\Resources\Admin\UserPacakges\UserPacakgesResource;

class UserPacakgesController extends BaseController
{
    public function __construct(UserPacakgesRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'UserPacakges'
        );

        $this->storeRequestClass = UserPacakgesStoreRequest::class;
        $this->updateRequestClass = UserPacakgesUpdateRequest::class;
        $this->resourceClass = UserPacakgesResource::class;
        $this->withRelationships = ['user'];
    }
}
