<?php

namespace App\Http\Controllers\Api\UserContact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserContact\UpdateUserContactRequest;
use App\Http\Requests\Api\UserContact\UserContactRequest;
use App\Models\UserContact;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserContactController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $contacts = UserContact::where('user_id', auth('api')->id())->get();
        return $this->successResponse($contacts, 'Contacts retrieved successfully');
    }
    // public function store(UserContactRequest $request)
    // {
    //     $validated = $request->validated();

    //     try {
    //         DB::beginTransaction();

    //         $userId = auth('api')->id();

    //         $contacts = collect($validated['contacts'])->map(function ($contact) use ($userId) {
    //             return UserContact::create([
    //                 'user_id' => $userId,
    //                 'type'    => $contact['type'],
    //                 'value'   => $contact['value'],
    //             ]);
    //         });

    //         DB::commit();
    //         return $this->successResponse($contacts, 'Contacts created successfully', 201);
    //     } catch (\Throwable $e) {
    //         DB::rollBack();
    //         return $this->errorResponse("Failed to create contacts", 500);
    //     }
    // }

    public function upsert(UserContactRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $userId = auth('api')->id();

            $contacts = collect($validated['contacts'])->map(function ($contact) use ($userId) {
                return UserContact::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'type'    => $contact['type'],
                    ],
                    [
                        'value' => $contact['value'],
                    ]
                );
            });

            DB::commit();
            return $this->successResponse($contacts, 'Contacts saved successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
