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
            'phone' => 'nullable|string|max:255|unique:users,phone',
            'country_code' => 'required|string|max:255',
            'is_active' => 'required|integer',
            'email_verified_at' => 'nullable|date',
            'remember_token' => 'nullable|string',
            'role' => 'nullable|in:user,provider,admiin,super_admin',
            'social_type' => 'nullable|in:google,apple,facebook',
            'social_id' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
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
            'phone.max' => 'The phone may not be greater than 255 characters.',
            'phone.unique' => 'This phone has already been taken.',
            'country_code.required' => 'The country code field is required.',
            'country_code.max' => 'The country code may not be greater than 255 characters.',
            'is_active.required' => 'The is active field is required.',
            'email_verified_at.date' => 'The email verified at is not a valid date.',
            'social_id.max' => 'The social id may not be greater than 255 characters.',
            'password.max' => 'The password may not be greater than 255 characters.',
            'last_login_at.date' => 'The last login at is not a valid date.',
        ];
    }
}
