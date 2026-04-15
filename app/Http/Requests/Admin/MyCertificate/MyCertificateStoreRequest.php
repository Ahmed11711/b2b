<?php

namespace App\Http\Requests\Admin\MyCertificate;

use App\Http\Requests\BaseRequest\BaseRequest;

class MyCertificateStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'image' => 'nullable|file|image|max:2048',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [

            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'issue_date.date' => 'The issue date is not a valid date.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
        ];
    }
}
