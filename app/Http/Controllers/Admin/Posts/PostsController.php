<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Posts\PostsStoreRequest;
use App\Http\Requests\Admin\Posts\PostsUpdateRequest;
use App\Http\Resources\Admin\Posts\PostsResource;
use App\Models\ServiceContact;
use App\Repositories\Posts\PostsRepositoryInterface;
use Illuminate\Http\Request;

class PostsController extends BaseController
{
    public function __construct(PostsRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Posts',
            fileFields: ['image']
        );

        $this->storeRequestClass = PostsStoreRequest::class;
        $this->updateRequestClass = PostsUpdateRequest::class;
        $this->resourceClass = PostsResource::class;
        // $this->isUserBound        = true;
        $this->hasGallery         = true;
        $this->withRelationships  = ['user:id,name,email,image', 'contacts'];
    }

    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = $request->get('user_id');
        unset($data['gallery']);
        $data['is_active'] = true;

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
                    'type'            => 'posts',
                ]);
            }
        }
    }

    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'gallery',
            'bids'
        ]);
    }
}
