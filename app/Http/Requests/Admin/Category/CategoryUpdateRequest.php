<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\BaseRequest\BaseRequest;

class CategoryUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'name_ar' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|string|max:255|file|image|max:2048',
            'sort_order' => 'sometimes|required|integer',
            'is_active' => 'sometimes|required|integer',
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
