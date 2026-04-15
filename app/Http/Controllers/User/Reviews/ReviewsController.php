<?php

namespace App\Http\Controllers\User\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Reviews\ReviewsRequest;
use App\Models\ServiceReviews;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewsController extends Controller
{
    use ApiResponseTrait;
    public function store(ReviewsRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $userId = auth('api')->id();

            $serviceId = $data['service_id'] ?? null;

            if ($serviceId) {
                $exists = ServiceReviews::where('user_id', $userId)
                    ->where('service_id', $serviceId)
                    ->exists();

                if ($exists) {
                    return $this->errorResponse("You have already reviewed this service.", 400);
                }
            }

            $review = ServiceReviews::create([
                'user_id'    => $userId,
                'service_id' => $serviceId,
                'provider_id' => $data['provider_id'],
                'rating'     => $data['rating'],
                'comment'    => $data['comment'],
            ]);

            return $this->successResponse(
                $review,
                "Your review has been submitted successfully."
            );
        } catch (\Throwable $e) {
            Log::error("Review Store Error: " . $e->getMessage());

            return $this->errorResponse(
                "Failed to submit review. Please try again later.",
                500
            );
        }
    }
}
