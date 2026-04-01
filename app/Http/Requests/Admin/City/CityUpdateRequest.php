<?php

namespace App\Http\Requests\Admin\City;

use App\Http\Requests\BaseRequest\BaseRequest;

class CityUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country_id' => 'sometimes|required|integer|exists:countries,id|display_field:name',
            'name_ar' => 'sometimes|required|string|max:255',
            'name_en' => 'sometimes|required|string|max:255',
            'is_active' => 'sometimes|required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'country_id.required' => 'The country id field is required.',
            'country_id.exists' => 'The selected country id is invalid.',
            'name_ar.required' => 'The name ar field is required.',
            'name_ar.max' => 'The name ar may not be greater than 255 characters.',
            'name_en.required' => 'The name en field is required.',
            'name_en.max' => 'The name en may not be greater than 255 characters.',
            'is_active.required' => 'The is active field is required.',
        ];
    }
}
