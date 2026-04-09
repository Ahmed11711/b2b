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
            'user_id' => 'sometimes|nullable|exists:users,id|display_field:name',
            'category_id' => 'sometimes|nullable|exists:categories,id|display_field:name',
            'status' => 'sometimes|required|in:pending,confirmed,canceled,expired',
            'title' => 'sometimes|required|string|max:255',
            'title_ar' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|file|image|max:2048',
            'attachment_file' => 'sometimes|nullable|file|image|max:2048',
            'price' => 'sometimes|required|numeric',
            'active' => 'sometimes|required|integer',
            'is_featured' => 'sometimes|required|integer',
            'published_at' => 'sometimes|nullable|date',
            'expire_date' => 'sometimes|nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.exists' => 'The selected user id is invalid.',
            'category_id.exists' => 'The selected category id is invalid.',
            'status.required' => 'The status field is required.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title_ar.required' => 'The title ar field is required.',
            'title_ar.max' => 'The title ar may not be greater than 255 characters.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'attachment_file.image' => 'The attachment file must be a valid image file.',
            'attachment_file.max' => 'The attachment file may not be greater than 2048 KB.',
            'price.required' => 'The price field is required.',
            'active.required' => 'The active field is required.',
            'is_featured.required' => 'The is featured field is required.',
            'published_at.date' => 'The published at is not a valid date.',
            'expire_date.date' => 'The expire date is not a valid date.',
        ];
    }
}
