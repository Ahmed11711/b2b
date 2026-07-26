<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Validation\Rule;

class UesrSubscribeRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'package_id' => [
                'required',
                Rule::exists('packages', 'id')->where(fn($query) => $query->where('is_free', false)),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'package_id.exists' => 'You cannot subscribe to this package because it is a free package.',
        ];
    }
}
