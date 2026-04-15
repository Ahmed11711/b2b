<?php

namespace App\Http\Requests\Admin\Posts;

use App\Http\Requests\BaseRequest\BaseRequest;

class PostsUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|required|exists:users,id|display_field:name',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price_from' => 'sometimes|required|numeric',
            'price_to' => 'sometimes|required|numeric',
            'image' => 'sometimes|nullable|file|image|max:2048',
            'is_active' => 'sometimes|required|integer',
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
