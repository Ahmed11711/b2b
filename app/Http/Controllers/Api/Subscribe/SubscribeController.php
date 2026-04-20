<?php

namespace App\Http\Controllers\Api\Subscribe;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UesrSubscribeRequest;

use App\Services\Subscription\SubscriptionService;
use App\Traits\ApiResponseTrait;

class SubscribeController extends Controller
{
    use ApiResponseTrait;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function subscribe(UesrSubscribeRequest $request)
    {
        $user = auth('api')->user();

        try {
            $subscription = $this->subscriptionService->subscribeUser(
                $user->id,
                $request->package_id
            );

            return $this->successResponse(
                $subscription,
                "You SubScribe success"
            );
        } catch (\Exception $e) {
            return $this->errorResponse("can you tray leter"  . $e->getMessage(), 500);
        }
    }
}
