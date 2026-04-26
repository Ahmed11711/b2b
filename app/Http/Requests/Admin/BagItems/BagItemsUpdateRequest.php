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
            'bags_categories_id' => 'sometimes|nullable|exists:bags_categories,id|display_field:title',
            'title' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'image' => 'sometimes|required|file|image|max:2048',
            'currency' => 'sometimes|required|in:ريال,دولار,جنيه مصري',
            'rating' => 'sometimes|nullable|string|max:255',
            'desc' => 'sometimes|required|string',
            'Whose' => 'sometimes|nullable|string',
            'what_will_you_get' => 'sometimes|nullable|string',
            'gallery'           => 'nullable|array',
            'gallery.*.file'    => 'required|file|max:10240',
            'gallery.*.type'    => 'nullable|in:image,video,word,pdf,excel,other,zip,download_demo',

        ];
    }

    public function messages(): array
    {
        return [
            'bags_categories_id.exists' => 'The selected bags categories id is invalid.',
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
