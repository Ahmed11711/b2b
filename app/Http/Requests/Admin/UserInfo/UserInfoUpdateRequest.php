<?php

namespace App\Http\Requests\Admin\UserInfo;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserInfoUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country_id' => 'sometimes|nullable|exists:countries,id|display_field:name',
            'city_id' => 'sometimes|nullable|exists:cities,id|display_field:name',
            'info' => 'sometimes|nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'country_id.exists' => 'The selected country id is invalid.',
            'city_id.exists' => 'The selected city id is invalid.',
        ];
    }
}
