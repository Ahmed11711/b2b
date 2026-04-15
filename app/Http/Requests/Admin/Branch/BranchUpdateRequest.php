<?php

namespace App\Http\Requests\Admin\Branch;

use App\Http\Requests\BaseRequest\BaseRequest;

class BranchUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'mobile' => 'sometimes|required|string|max:255',
            'lat' => 'sometimes|nullable|numeric',
            'lng' => 'sometimes|nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user id field is required.',
            'user_id.exists' => 'The selected user id is invalid.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'address.required' => 'The address field is required.',
            'address.max' => 'The address may not be greater than 255 characters.',
            'mobile.required' => 'The mobile field is required.',
            'mobile.max' => 'The mobile may not be greater than 255 characters.',
        ];
    }
}
