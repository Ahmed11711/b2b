<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateAcountRequest;
use App\Models\Package;
use App\Services\Auth\AuthService;
use App\Services\Subscription\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateAcountController extends Controller
{
    public function __construct(public AuthService $authService, public SubscriptionService $subscriptionService) {}

    public function register(CreateAcountRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'user';
        $result = $this->authService->handleRegister($data);

        $freePackage = $this->getPacakeFree();
        if ($freePackage) {
            if ($freePackage) {
                $this->subscriptionService->subscribeUser($result['user']->id, $freePackage->id);
            }
        }
        return $this->respondWithToken($result['token'], $result['user']);
    }

    protected function respondWithToken(string $token, $user): JsonResponse
    {
        return response()->json([
            'status' => true,
            'user'   => $user,
            'authorisation' => [
                'token'      => $token,
                'type'       => 'bearer',
                'expires_in' => config('jwt.ttl') * 60
            ]
        ]);
    }

    public function getPacakeFree()
    {
        return Package::where('name', 'free')->select('id')->first();
    }
}
