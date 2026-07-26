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
                Rule::exists('packages', 'id')->where(function ($query) {
                    $query->where(function ($q) {
                        $q->where('is_free', false)
                            ->orWhereNull('is_free');
                    });
                }),
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
