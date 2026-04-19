<?php

namespace App\Http\Requests\Admin\BagItems;

use App\Http\Requests\BaseRequest\BaseRequest;

class BagItemsStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|file|image|max:2048',
            'currency' => 'required|in:ريال,دولار,جنيه مصري',
            'rating' => 'nullable|string|max:255',
            'desc' => 'required|string',
            'Whose' => 'nullable|string',
            'what_will_you_get' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'price.required' => 'The price field is required.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'currency.required' => 'The currency field is required.',
            'rating.max' => 'The rating may not be greater than 255 characters.',
            'desc.required' => 'The desc field is required.',
        ];
    }
}
