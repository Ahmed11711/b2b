<?php

namespace App\Http\Controllers\Api\Verification;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\verification\verificationStoreRequest;
use App\Http\Requests\Admin\verification\verificationUpdateRequest;
use App\Http\Resources\Admin\verification\verificationResource;
use App\Models\Verification;
use App\Repositories\verification\verificationRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerificationApiController extends BaseController
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

    public function store(Request $request): JsonResponse
    {
        // لو كان عنده طلب قديم مرفوض، امسحه الأول عشان يتحط بدل منه واحد جديد
        Verification::where('user_id', auth('api')->id())
            ->where('status', 'rejected')
            ->delete();

        return parent::store($request);
    }

    protected function beforeStore(array $data, Request $request): array
    {
        $data['user_id'] = auth('api')->id();
        $data['status']  = 'pending';
        return $data;
    }

    protected function beforeUpdate(array $data, $existingRecord, Request $request): array
    {
        // حماية إضافية: مينفعش الـ status يتغير من هنا مهما حصل
        unset($data['status']);

        // لو كان مرفوض وعدّل بياناته، يرجع pending تاني عشان يتراجع تاني
        if ($existingRecord->status === 'rejected') {
            $data['status'] = 'pending';
        }

        return $data;
    }

    protected function applyScoping($query)
    {
        return $query->where('user_id', auth('api')->id());
    }

    public function myVerification(): JsonResponse
    {
        $record = $this->applyScoping($this->repository->query())->first();

        if (!$record) {
            return $this->errorResponse('No verification request found.', 404);
        }

        return $this->successResponse(new $this->resourceClass($record), 'Verification retrieved successfully');
    }
}
