<?php

namespace App\Http\Requests\Api\ProfileAccount;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Validation\Rule;

class ProfileAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        $userId = auth('api')->id();

        return [
            'name' => 'nullable|string|max:255',
            'email' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'password' => 'nullable|string|max:255',
            'phone' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('users', 'phone')->ignore($userId),
            ],
            'user_name' => 'nullable|string|max:255',
            'whtsapp' => 'nullable|string|max:255',
            'country_code' => 'nullable|string|max:255',
            'image' => 'nullable|file|image|max:2048',
            'info' => 'nullable|string',
            'bio' => 'nullable|string',
            'categories'   => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'experience_years' => 'nullable|string|max:255',

            'coverage_type' => 'nullable|in:online,all_areas,specific_cities',
            'cities'   => 'nullable|array|required_if:coverage_type,specific_cities',
            'cities.*' => 'exists:cities,id',
        ];
    }
}
