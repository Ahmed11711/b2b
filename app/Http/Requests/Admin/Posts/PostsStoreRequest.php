<?php

namespace App\Http\Requests\Admin\Posts;

use App\Http\Requests\BaseRequest\BaseRequest;

class PostsStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
            'image' => 'required|file|image|max:2048',
            'gallery'    => 'required|array',
            'gallery.*'  => 'file|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user id field is required.',
            'user_id.exists' => 'The selected user id is invalid.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.required' => 'The description field is required.',
            'price_from.required' => 'The price from field is required.',
            'price_to.required' => 'The price to field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'is_active.required' => 'The is active field is required.',
        ];
    }
}
