<?php

namespace App\Http\Requests\Admin\MyCertificate;

use App\Http\Requests\BaseRequest\BaseRequest;

class MyCertificateUpdateRequest extends BaseRequest
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
            'issue_date' => 'sometimes|nullable|date',
            'image' => 'sometimes|nullable|file|image|max:2048',
            'description' => 'sometimes|nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user id field is required.',
            'user_id.exists' => 'The selected user id is invalid.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'issue_date.date' => 'The issue date is not a valid date.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
        ];
    }
}
