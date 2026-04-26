<?php

namespace App\Http\Controllers\Admin\Package;

use App\Repositories\Package\PackageRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Package\PackageStoreRequest;
use App\Http\Requests\Admin\Package\PackageUpdateRequest;
use App\Http\Resources\Admin\Package\PackageResource;
use Illuminate\Http\Request;

class PackageController extends BaseController
{
    public function __construct(PackageRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Package'
        );

        $this->storeRequestClass = PackageStoreRequest::class;
        $this->updateRequestClass = PackageUpdateRequest::class;
        $this->resourceClass = PackageResource::class;

        $this->withRelationships = ['package_features'];
    }

    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'package_features'
        ]);
    }

    protected function afterStore($record, Request $request): void
    {
        $this->syncFeatures($record, $request);
    }

    protected function afterUpdate($updatedRecord, $oldRecord, Request $request): void
    {
        $this->syncFeatures($updatedRecord, $request);
    }

    private function syncFeatures($record, Request $request): void
    {
        if (!$request->has('features')) return;

        $record->package_features()->delete();

        foreach ($request->input('features', []) as $feature) {
            $record->package_features()->create([
                'feature_id' => $feature['feature_id'],
                'value'      => $feature['value'],
                'lable'      => $feature['lable'],
            ]);
        }
    }
}
