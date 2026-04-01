<?php

namespace App\Http\Requests\Admin\Country;

use App\Http\Requests\BaseRequest\BaseRequest;

class CountryUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_ar' => 'sometimes|required|string|max:255',
            'name_en' => 'sometimes|required|string|max:255',
            'code' => 'sometimes|required|string|max:3|unique:countries,code,'.$this->route('country').',id',
            'is_active' => 'sometimes|required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'The name ar field is required.',
            'name_ar.max' => 'The name ar may not be greater than 255 characters.',
            'name_en.required' => 'The name en field is required.',
            'name_en.max' => 'The name en may not be greater than 255 characters.',
            'code.required' => 'The code field is required.',
            'code.max' => 'The code may not be greater than 3 characters.',
            'code.unique' => 'This code has already been taken.',
            'is_active.required' => 'The is active field is required.',
        ];
    }
}
