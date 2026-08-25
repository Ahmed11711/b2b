<?php

namespace App\Http\Controllers\Admin\Verification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\verification\verificationUpdateStatusRequest;
use App\Http\Resources\Admin\verification\verificationResource;
use App\Repositories\verification\verificationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateVerficationController extends Controller
{
    use ApiResponseTrait;

    protected verificationRepositoryInterface $repository;

    public function __construct(verificationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request, int $id): JsonResponse
    {
        $validated = app(verificationUpdateStatusRequest::class)->validated();

        $query = $this->repository->query();
        $query = $this->applyScoping($query);

        $record = $query->find($id);

        if (!$record) {
            return $this->errorResponse("Record not found or unauthorized", 404);
        }

        try {
            DB::beginTransaction();

            Log::info('=== Verification Update Debug ===', [
                'raw_request_all'      => $request->all(),
                'validated_data'       => $validated,
                'existing_status'      => $record->status,
                'request_has_status'   => $request->has('status'),
                'request_status_value' => $request->input('status'),
            ]);

            $record->update($validated);

            DB::commit();

            Log::info('=== Verification After Update ===', [
                'updated_status'       => $record->status,
                'updated_record_fresh' => $record->fresh()->toArray(),
            ]);

            return $this->successResponse(
                new verificationResource($record->fresh()),
                'Record updated successfully'
            );
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("Error updating verification: " . $e->getMessage());
            return $this->errorResponse("Failed to update record", 500);
        }
    }

    protected function applyScoping($query)
    {
        $user = auth('api')->user();

        if ($user && $user->role === 'super_admin') {
            return $query;
        }

        return $query->where('user_id', 11);
    }
}
