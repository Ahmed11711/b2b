<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateAcountRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateAcountController extends Controller
{
    public function __construct(public AuthService $authService) {}

    public function register(CreateAcountRequest $request): JsonResponse
    {
        $data = $request->validated();

        $result = $this->authService->handleRegister($data);

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
}
