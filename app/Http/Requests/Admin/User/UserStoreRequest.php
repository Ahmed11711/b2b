<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|max:255|unique:users,email',
            'password' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255|unique:users,phone',
            'user_name' => 'nullable|string|max:255',
            'whtsapp' => 'nullable|string|max:255',
            'country_code' => 'required|string|max:255',
            'is_active' => 'required|integer',
            'email_verified_at' => 'nullable|date',
            'remember_token' => 'nullable|string',
            'role' => 'nullable|in:user,super_admin',
            'social_type' => 'nullable|in:google,apple,facebook',
            'social_id' => 'nullable|',
            'city_id' => 'nullable|exists:cities,id|display_field:name',
            'info' => 'nullable|string',
            'last_login_at' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'This email has already been taken.',
            'password.max' => 'The password may not be greater than 255 characters.',
            'phone.max' => 'The phone may not be greater than 255 characters.',
            'phone.unique' => 'This phone has already been taken.',
            'user_name.max' => 'The user name may not be greater than 255 characters.',
            'whtsapp.max' => 'The whtsapp may not be greater than 255 characters.',
            'country_code.required' => 'The country code field is required.',
            'country_code.max' => 'The country code may not be greater than 255 characters.',
            'is_active.required' => 'The is active field is required.',
            'email_verified_at.date' => 'The email verified at is not a valid date.',
            'city_id.exists' => 'The selected city id is invalid.',
            'last_login_at.date' => 'The last login at is not a valid date.',
        ];
    }
}
