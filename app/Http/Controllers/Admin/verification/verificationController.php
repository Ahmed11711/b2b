<?php

namespace App\Http\Controllers\Admin\Verification;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\verification\verificationStoreRequest;
use App\Http\Requests\Admin\verification\verificationUpdateRequest;
use App\Http\Resources\Admin\verification\verificationResource;
use App\Repositories\verification\verificationRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VerificationController extends BaseController
{
    public function __construct(verificationRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'verification',
            fileFields: ['id_card_front', 'id_card_back', 'commercial_register', 'tax_card']
        );

        $this->storeRequestClass  = verificationStoreRequest::class;
        $this->updateRequestClass = verificationUpdateRequest::class;
        $this->resourceClass      = verificationResource::class;
    }

    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = auth('api')->id();
        $data['status']  = 'pending';
        return $data;
    }

    /**
     * Override store() لأن كل مستخدم مسموح له بسجل verification واحد بس (unique user_id).
     */
    public function store(Request $request): JsonResponse
    {
        $validated = app($this->storeRequestClass)->validated();
        $userId    = auth('api')->id();

        $existing = $this->repository->query()->where('user_id', $userId)->first();

        if ($existing && $existing->status === 'pending') {
            return $this->errorResponse('You already have a pending verification request.', 422);
        }

        if ($existing && $existing->status === 'approved') {
            return $this->errorResponse('Your account is already verified.', 422);
        }

        try {
            DB::beginTransaction();

            $validated = $this->beforeStore($validated, $request);
            $validated = $this->handleFileUploads($request, $validated, $existing);

            if ($existing) {
                // كانت rejected، اعمل update بدل insert جديد
                $existing->update($validated);
                $record = $existing;
            } else {
                $record = $this->repository->create($validated);
            }

            $this->afterStore($record, $request);

            DB::commit();

            $record->load($this->withRelationships);

            return $this->successResponse(new $this->resourceClass($record), 'Record created successfully', 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("Error creating {$this->collectionName}: " . $e->getMessage());
            return $this->errorResponse("Failed to create {$this->collectionName}: " . $e->getMessage(), 500);
        }
    }
}
