<?php

namespace App\Http\Requests\Admin\Ads;

use App\Http\Requests\BaseRequest\BaseRequest;

class AdsStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'image' => 'required|file|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title_ar.required' => 'The title ar field is required.',
            'title_ar.max' => 'The title ar may not be greater than 255 characters.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
        ];
    }
}
