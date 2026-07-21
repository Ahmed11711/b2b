<?php

namespace App\Http\Requests\Api\ProfileAccount;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileInfoRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'info' => ['required', 'string',],
        ];
    }
}
