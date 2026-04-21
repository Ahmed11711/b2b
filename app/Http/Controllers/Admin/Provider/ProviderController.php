<?php

namespace App\Http\Controllers\Admin\Provider;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Resources\Admin\provider\ProviderResource;
use App\Repositories\User\UserRepository as UserUserRepository;
use App\Repositories\UserRepository; // أو أي repository عندك
use Illuminate\Http\Request;

class ProviderController extends BaseController
{
    protected string $resourceClass = ProviderResource::class;

    public function __construct(UserUserRepository $repository)
    {
        $this->initService($repository, 'User', ['image']);
    }

    protected function applyScoping($query)
    {
        return $query->where('role', 'user')
            ->withCount([
                'services',
                'reviews as reviews_count' => fn($q) => $q->whereNull('service_id')
            ]);
    }
    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'services'
        ]);
    }
    protected function getIndexRelationships(): array
    {
        return [
            'package.package:id,name',

        ];
    }
}
