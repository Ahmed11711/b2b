<?php

namespace App\Http\Controllers\Api\Service;

use \App\Models\ServiceContact;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Service\ServiceStoreRequest;
use App\Http\Requests\Admin\Service\ServiceUpdateRequest;
use App\Http\Resources\Admin\Service\ServiceResource;
use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceApiController extends BaseController
{
    public function __construct(ServiceRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Service',
            fileFields: ['image'],
        );

        $this->storeRequestClass  = ServiceStoreRequest::class;
        $this->updateRequestClass = ServiceUpdateRequest::class;
        $this->resourceClass      = ServiceResource::class;
        $this->isUserBound        = true;
    }

    /**
     */
    protected function beforeStore(array $data, Request $request): array
    {
        return collect($data)
            ->except(['contact_ids'])
            ->toArray();
    }

    /**
     */
    protected function afterStore($record, Request $request): void
    {
        $this->syncContacts($record, $request);
    }

    /**
     */
    protected function afterUpdate($updatedRecord, $oldRecord, Request $request): void
    {
        $updatedRecord->contacts()->delete();
        $this->syncContacts($updatedRecord, $request);
    }

    /**
     * Sync Contacts (Reusable)
     */
    private function syncContacts($record, Request $request): void
    {
        if ($request->has('contact_ids') && is_array($request->contact_ids)) {
            foreach ($request->contact_ids as $id) {
                ServiceContact::create([
                    'service_id'      => $record->id,
                    'user_contact_id' => $id,
                    'type'            => 'service',
                ]);
            }
        }
    }
}
