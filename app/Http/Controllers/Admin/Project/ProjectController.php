<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Project\ProjectStoreRequest;
use App\Http\Requests\Admin\Project\ProjectUpdateRequest;
use App\Http\Resources\Admin\Project\ProjectResource;
use App\Models\ServiceContact;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    public function __construct(ProjectRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Project',
            fileFields: ['image']
        );

        $this->storeRequestClass = ProjectStoreRequest::class;
        $this->updateRequestClass = ProjectUpdateRequest::class;
        $this->resourceClass = ProjectResource::class;
        $this->isUserBound        = true;
        $this->withRelationships = ['contacts'];
    }

    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = $request->get('user_id');

        return collect($data)
            ->except(['contact_ids'])
            ->toArray();
    }
    protected function afterStore($record, Request $request): void
    {
        $this->syncContacts($record, $request);
    }
    protected function afterUpdate($updatedRecord, $oldRecord, Request $request): void
    {
        $updatedRecord->contacts()->delete();
        $this->syncContacts($updatedRecord, $request);
    }

    private function syncContacts($record, Request $request): void
    {
        if ($request->has('contact_ids') && is_array($request->contact_ids)) {
            foreach ($request->contact_ids as $id) {
                ServiceContact::create([
                    'service_id'      => $record->id,
                    'user_contact_id' => $id,
                    'type'            => 'project',
                ]);
            }
        }
    }
}
