<?php

namespace App\Http\Controllers\User\AllProviders;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Resources\User\Provider\OneProviderResource;
use App\Http\Resources\User\Provider\ProviderResource;
use App\Models\User;
use App\QueryFilters\CategoryFilter;
use App\QueryFilters\Search;
use App\Repositories\User\UserRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Tymon\JWTAuth\Facades\JWTAuth;

class AllProvidersController extends BaseController
{
    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->resourceClass = ProviderResource::class;
    }



    public function allProvider(Request $request)
    {
        try {
            $authUserId = $this->getOptionalAuthUserId();

            $query = User::query()
                ->where('role', 'user')
                ->where('is_active', true)
                ->with(['city']);

            if ($authUserId) {
                $query->where('id', '!=', $authUserId);
            }

            $data = app(Pipeline::class)
                ->send($query)
                ->through([
                    Search::class,
                    CategoryFilter::class,
                ])
                ->thenReturn()
                ->latest()
                ->paginate($request->input('per_page', 10));

            $resourceData = $this->resourceClass::collection($data);

            return $this->successResponsePaginate($resourceData, "Providers retrieved successfully");
        } catch (\Throwable $e) {
            return $this->errorResponse("Failed to fetch providers: " . $e->getMessage(), 500);
        }
    }

    private function getOptionalAuthUserId(): ?int
    {
        try {
            if (JWTAuth::getToken() && ($user = JWTAuth::parseToken()->authenticate())) {
                return $user->id;
            }
        } catch (\Throwable $e) {
            // مفيش توكن أو توكن غلط/منتهي -> اعتبره guest وكمل عادي
        }

        return null;
    }
    public function oneProvider(Request $request, $id)
    {
        try {
            $provider = User::query()
                ->where('role', 'user')
                ->with([
                    'city',
                    'services' => function ($query) {
                        $query->where('is_active', 1);
                    },
                    'projects',
                    'certificates',
                    'branches',
                    'reviews',
                    'verification',

                ])
                ->findOrFail($id);

            return $this->successResponse(
                new OneProviderResource($provider),
                "Provider details retrieved successfully"
            );
        } catch (\Throwable $e) {
            return $this->errorResponse("Provider not found or error occurred", 404);
        }
    }

    public function topProviders(Request $request)
    {
        try {
            $providers = User::query()
                ->select('id', 'name', 'email', 'image')
                ->where('role', 'user')
                ->where('is_active', true)

                ->withAvg('reviews', 'rating')

                ->orderByDesc('reviews_avg_rating')

                ->limit(5)
                ->get();

            $resourceData = $this->resourceClass::collection($providers);

            return $this->successResponse($resourceData, "Top 5 rated providers retrieved successfully");
        } catch (\Throwable $e) {
            return $this->errorResponse("Error: " . $e->getMessage(), 500);
        }
    }
}
