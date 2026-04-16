<?php

namespace App\Http\Requests\Admin\Package;

use App\Http\Requests\BaseRequest\BaseRequest;

class PackageStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'active' => 'required|in:active,inactive',
            'duration_months' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'price.required' => 'The price field is required.',
            'active.required' => 'The active field is required.',
            'duration_months.required' => 'The duration months field is required.',
        ];
    }
}
