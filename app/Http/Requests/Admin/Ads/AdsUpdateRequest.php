<?php

namespace App\Http\Requests\Admin\Ads;

use App\Http\Requests\BaseRequest\BaseRequest;

class AdsUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'sometimes|nullable|exists:categories,id|display_field:name',
            'status' => 'sometimes|required|in:pending,confirmed,canceled,expired',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|file|image|max:2048',
            'is_active' => 'sometimes|required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.exists' => 'The selected category id is invalid.',
            'status.required' => 'The status field is required.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'is_active.required' => 'The is active field is required.',
        ];
    }
}
