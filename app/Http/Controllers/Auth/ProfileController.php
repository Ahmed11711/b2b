<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\LoginResource;
use App\Services\Auth\AuthService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use ApiResponseTrait;
    public function __construct(public AuthService $authService) {}

    public function me(): JsonResponse
    {
        $user = $this->authService->getAuthenticatedUser();
        return $this->successResponse(new LoginResource($user));
    }


    public function logout(): JsonResponse
    {
        $this->authService->handleLogout();
        return $this->messageResponse('Successfully logged out');
    }
}
