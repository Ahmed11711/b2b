<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Customer\CustomerResource;
use App\Http\Resources\User\Provider\ProviderResource;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{

    protected string $resourceClass = CustomerResource::class;

    public function __construct(UserRepository $repository)
    {
        $this->initService($repository, 'User', ['image']);
    }

    protected function applyScoping($query)
    {
        return $query->where('role', 'user')
            ->withCount([
                'posts',
            ]);
    }

    protected function getIndexRelationships(): array
    {
        return ['posts:id,title'];
    }
}
