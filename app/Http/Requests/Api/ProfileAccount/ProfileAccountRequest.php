<?php

namespace App\Http\Requests\Api\ProfileAccount;

use App\Http\Requests\BaseRequest\BaseRequest;

class ProfileAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|max:255|unique:users,email',
            'password' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255|unique:users,phone',
            'user_name' => 'nullable|string|max:255',
            'whtsapp' => 'nullable|string|max:255',
            'country_code' => 'nullable|string|max:255',

            'info' => 'nullable|string',
            'categories'   => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ];
    }
}
