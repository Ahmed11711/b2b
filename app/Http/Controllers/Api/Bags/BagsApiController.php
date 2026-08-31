<?php

namespace App\Http\Controllers\Api\Bags;

use App\Repositories\Bag\BagRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Resources\Admin\Bag\BagResource;
use App\QueryFilters\ColumnFilter;
use App\QueryFilters\Search;
use App\QueryFilters\SelectFields;
use App\QueryFilters\SortBy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Log;

class BagsApiController extends BaseController
{
    public function __construct(BagRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Bag',
            fileFields: ['image', 'icon']
        );

        $this->resourceClass = BagResource::class;
    }

    /**
     * Override كامل للـ index بس في الكلاس ده،
     * من غير ما نلمس BaseController خالص.
     */
    public function index(Request $request): JsonResponse
    {
        Log::info("Index request received for {$this->collectionName} with parameters: " . json_encode($request->all()));
        try {
            $query = $this->repository->query()->with($this->getIndexRelationships());
            $query = $this->applyScoping($query);

            $query = app(Pipeline::class)
                ->send($query)
                ->through([
                    Search::class,
                    ColumnFilter::class,
                    SelectFields::class,
                    SortBy::class,
                ])
                ->thenReturn();

            // لو مفيش أي فلاتر أو بيانات جاية في الريكوست، رجّع بترتيب عشوائي
            if (empty($request->except('per_page', 'page'))) {
                $query->reorder()->inRandomOrder();
            }

            $data = $query->paginate($request->input('per_page', 10));

            if (class_exists($this->resourceClass)) {
                $data = $this->resourceClass::collection($data);
            }

            return $this->successResponsePaginate($data, "Data retrieved via Pipeline");
        } catch (\Throwable $e) {
            Log::error("Pipeline Error: " . $e->getMessage());
            return $this->errorResponse("Failed to fetch data", 500);
        }
    }

    protected function getShowRelationships(): array
    {
        return array_merge($this->withRelationships, [
            'bagCategory'
        ]);
    }
}
