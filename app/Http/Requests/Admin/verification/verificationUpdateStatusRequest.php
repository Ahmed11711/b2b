<?php

namespace App\Http\Requests\Admin\verification;

use App\Http\Requests\BaseRequest\BaseRequest;

class verificationUpdateStatusRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'status' => 'required|in:pending,approved,rejected',
            'notes'  => 'nullable|string|max:1000',

        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status is required.',
            'status.in'       => 'Status must be one of: pending, approved, rejected.',
        ];
    }
}
