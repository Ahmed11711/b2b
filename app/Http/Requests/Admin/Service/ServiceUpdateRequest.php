<?php

namespace App\Http\Requests\Admin\Service;

use App\Http\Requests\BaseRequest\BaseRequest;

class ServiceUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|nullable|exists:users,id|display_field:name',
            'category_id' => 'sometimes|nullable|exists:categories,id|display_field:name',
            'city_id' => 'sometimes|nullable|exists:cities,id|display_field:name',
            'title' => 'sometimes|required|string|max:255',
            'desc' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|file|image|max:2048',
            'price' => 'sometimes|required|string|max:255',
            'gallery'   => 'sometimes|nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',

        ];
    }

    public function messages(): array
    {
        return [
            'user_id.exists' => 'The selected user id is invalid.',
            'category_id.exists' => 'The selected category id is invalid.',
            'city_id.exists' => 'The selected city id is invalid.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'desc.required' => 'The desc field is required.',
            'desc.max' => 'The desc may not be greater than 255 characters.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'price.required' => 'The price field is required.',
            'price.max' => 'The price may not be greater than 255 characters.',
            'gallery.array'   => 'The gallery must be a list of images.',
            'gallery.*.image' => 'Each file in the gallery must be an image.',
            'gallery.*.max'   => 'Each image in the gallery may not be greater than 2048 KB.',
        ];
    }
}
