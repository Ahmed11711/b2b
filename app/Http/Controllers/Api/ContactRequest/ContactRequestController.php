<?php

namespace App\Http\Controllers\Api\ContactRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ContactStore\ContactRequestStoreRequest;
use App\Models\ContactRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    use ApiResponseTrait;
    public function store(ContactRequestStoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $contactRequest = ContactRequest::create($data);


        return $this->messageResponse(
            'Contact request created successfully',
            201
        );
    }
}
