<?php

namespace App\Http\Requests\Admin\BagItems;

use App\Http\Requests\BaseRequest\BaseRequest;

class BagItemsUpdateRequest extends BaseRequest
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
            'rating' => 'sometimes|nullable|string|max:255',
            'desc' => 'sometimes|required|string',
            'Whose' => 'sometimes|nullable|string',
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
            'rating.max' => 'The rating may not be greater than 255 characters.',
            'desc.required' => 'The desc field is required.',
        ];
    }
}
