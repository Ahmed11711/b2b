<?php

namespace App\Http\Requests\Admin\Feature;

use App\Http\Requests\BaseRequest\BaseRequest;

class FeatureStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'key' => 'required|string|max:255|unique:features,key',
            'lable' => 'required|string|max:255',
            'type' => 'required|in:boolean,number,text',
        ];
    }

    public function messages(): array
    {
        return [
            'key.required' => 'The key field is required.',
            'key.max' => 'The key may not be greater than 255 characters.',
            'key.unique' => 'This key has already been taken.',
            'lable.required' => 'The lable field is required.',
            'lable.max' => 'The lable may not be greater than 255 characters.',
            'type.required' => 'The type field is required.',
        ];
    }
}
