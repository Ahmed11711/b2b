<?php

namespace App\Http\Requests\Admin\UserPacakges;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserPacakgesUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|required|exists:users,id|display_field:name',
            'package_id' => 'sometimes|required|exists:packages,id|display_field:name',
            'starts_at' => 'sometimes|required|date',
            'ends_at' => 'sometimes|nullable|date',
            'active' => 'sometimes|required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user id field is required.',
            'user_id.exists' => 'The selected user id is invalid.',
            'package_id.required' => 'The package id field is required.',
            'package_id.exists' => 'The selected package id is invalid.',
            'starts_at.required' => 'The starts at field is required.',
            'starts_at.date' => 'The starts at is not a valid date.',
            'ends_at.date' => 'The ends at is not a valid date.',
            'active.required' => 'The active field is required.',
        ];
    }
}
