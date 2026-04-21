<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|nullable|string|max:255|unique:users,email,' . $this->route('user') . ',id',
            'password' => 'sometimes|nullable|string|max:255',
            'phone' => 'sometimes|nullable|string|max:255|unique:users,phone,' . $this->route('user') . ',id',
            'user_name' => 'sometimes|nullable|string|max:255',
            'image' => 'sometimes|nullable|file|image|max:2048',
            'whtsapp' => 'sometimes|nullable|string|max:255',
            'country_code' => 'sometimes|required|string|max:255',
            'is_active' => 'sometimes|required|integer',
            'email_verified_at' => 'sometimes|nullable|date',
            'role' => 'sometimes|nullable|in:user,super_admin',
            'city_id' => 'sometimes|nullable|exists:cities,id|display_field:name',
            'info' => 'sometimes|nullable|string',
            'last_login_at' => 'sometimes|nullable|date',
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
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
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
