<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\BaseRequest\BaseRequest;

class CategoryStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'required|file|image',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name_ar.required' => 'The name ar field is required.',
            'name_ar.max' => 'The name ar may not be greater than 255 characters.',
            'image.required' => 'The image field is required.',
            'image.max' => 'The image may not be greater than 255 KB.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'sort_order.required' => 'The sort order field is required.',
            'is_active.required' => 'The is active field is required.',
        ];
    }
}
