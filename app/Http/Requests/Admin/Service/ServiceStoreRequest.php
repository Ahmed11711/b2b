<?php

namespace App\Http\Requests\Admin\Service;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ServiceStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'nullable|exists:users,id|display_field:name',
            'category_id' => 'nullable|exists:categories,id|display_field:name',
            'city_id' => 'nullable|exists:cities,id|display_field:name',
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'image' => 'required|file|image|max:2048',
            'price' => 'required|string|max:255',
            'contact_ids' => 'required|array',
            'contact_ids.*' => [
                Rule::exists('user_contacts', 'id')
                    ->where(function ($query) {
                        $query->where('user_id', auth('api')->id());
                    }),
            ],
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

        ];
    }
}
