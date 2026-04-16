<?php

namespace App\Http\Requests\Admin\BagsCategory;

use App\Http\Requests\BaseRequest\BaseRequest;

class BagsCategoryUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bag_id' => 'sometimes|required|exists:bags,id|display_field:title',
            'title' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|nullable|file|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'bag_id.required' => 'The bag id field is required.',
            'bag_id.exists' => 'The selected bag id is invalid.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
        ];
    }
}
