<?php

namespace App\Http\Controllers\Admin\Verification;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\verification\verificationStoreRequest;
use App\Http\Requests\Admin\verification\verificationUpdateRequest;
use App\Http\Requests\Admin\verification\verificationUpdateStatusRequest;
use App\Http\Requests\Admin\verification\verificationUpdateStoresRequest;
use App\Http\Resources\Admin\verification\verificationResource;
use App\Repositories\verification\verificationRepositoryInterface;
use Illuminate\Http\Request;
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

        $this->storeRequestClass  = verificationUpdateStoresRequest::class;
        $this->updateRequestClass = verificationUpdateStatusRequest::class;
        $this->resourceClass      = verificationResource::class;
    }

    protected function applyScoping($query)
    {
        $user = auth('api')->user();

        if ($user && $user->role === 'super_admin') {
            return $query;
        }

        return $query;
    }

    // 👈 جديد: Log مؤقت للتشخيص
    protected function beforeUpdate(array $data, $existingRecord, Request $request): array
    {
        Log::info('=== Verification Update Debug ===', [
            'raw_request_all'     => $request->all(),
            'validated_data'      => $data,
            'existing_status'     => $existingRecord->status,
            'request_has_status'  => $request->has('status'),
            'request_status_value' => $request->input('status'),
        ]);

        return $data;
    }

    protected function afterUpdate($updatedRecord, $oldRecord, Request $request): void
    {
        Log::info('=== Verification After Update ===', [
            'updated_status' => $updatedRecord->status,
            'updated_record_fresh' => $updatedRecord->fresh()->toArray(),
        ]);
    }
}
