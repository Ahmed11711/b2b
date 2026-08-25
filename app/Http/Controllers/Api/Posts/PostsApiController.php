<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Posts\PostsStoreRequest;
use App\Http\Requests\Admin\Posts\PostsUpdateRequest;
use App\Http\Resources\Admin\Posts\PostsResource;
use App\Models\ServiceContact;
use App\QueryFilters\CategoryFilter;
use App\QueryFilters\ColumnFilter;
use App\QueryFilters\CountryFilter;
use App\QueryFilters\SelectFields;
use App\QueryFilters\Search;
use App\QueryFilters\SortBy;
use App\Repositories\Posts\PostsRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Log;

class PostsApiController extends BaseController
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
        $this->isUserBound        = true;
        $this->hasGallery         = true;
        $this->withRelationships  = [
            'user:id,name,email,image,coverage_type',
            'user.cities',
            'contacts'
        ];
    }

    /**
     * Override كامل لـ index() عشان نضيف CountryFilter بدون لمس BaseController
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = $this->repository->query()->with($this->getIndexRelationships());
            $query = $this->applyScoping($query);

            $data = app(Pipeline::class)
                ->send($query)
                ->through([
                    Search::class,
                    ColumnFilter::class,
                    CategoryFilter::class,  // 👈 جديد (لو محتاج many-to-many)
                    CountryFilter::class,   // 👈 جديد
                    SelectFields::class,
                    SortBy::class,
                ])
                ->thenReturn()
                ->latest()
                ->paginate($request->input('per_page', 10));

            if (class_exists($this->resourceClass)) {
                $data = $this->resourceClass::collection($data);
            }

            return $this->successResponsePaginate($data, "Data retrieved via Pipeline");
        } catch (\Throwable $e) {
            Log::error("Pipeline Error: " . $e->getMessage());
            return $this->errorResponse("Failed to fetch data", 500);
        }
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
