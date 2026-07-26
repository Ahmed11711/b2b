<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest\BaseRequest;
use App\Models\Package;
use Illuminate\Validation\Rule;

class UesrSubscribeRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'package_id' => [
                'required',
                'exists:packages,id',
                function ($attribute, $value, $fail) {
                    $isFree = \App\Models\Package::where('id', $value)->value('is_free');
                    if ($isFree) {
                        $fail('You cannot subscribe to this package because it is a free package.');
                    }
                },
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
