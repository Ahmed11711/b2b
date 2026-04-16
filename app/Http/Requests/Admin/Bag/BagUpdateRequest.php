<?php

namespace App\Http\Requests\Admin\Bag;

use App\Http\Requests\BaseRequest\BaseRequest;

class BagUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|file|image|max:2048',
            'icon' => 'nullable|file|image|max:2048',
            'free' => 'sometimes|required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'icon.max' => 'The icon may not be greater than 255 characters.',
            'free.required' => 'The free field is required.',
        ];
    }
}
