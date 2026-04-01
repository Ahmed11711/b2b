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
            'email' => 'sometimes|required|string|max:255|unique:users,email,'.$this->route('user').',id',
            'phone' => 'sometimes|nullable|string|max:255',
            'role' => 'sometimes|required|in:user,provider,admiin,super_admin',
            'email_verified_at' => 'sometimes|nullable|date',
            'password' => 'sometimes|required|string|max:255',
            'remember_token' => 'sometimes|nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'This email has already been taken.',
            'phone.max' => 'The phone may not be greater than 255 characters.',
            'role.required' => 'The role field is required.',
            'email_verified_at.date' => 'The email verified at is not a valid date.',
            'password.required' => 'The password field is required.',
            'password.max' => 'The password may not be greater than 255 characters.',
            'remember_token.max' => 'The remember token may not be greater than 100 characters.',
        ];
    }
}
