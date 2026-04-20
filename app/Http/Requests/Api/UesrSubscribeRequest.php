<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UesrSubscribeRequest extends BaseRequest
{


    public function rules(): array
    {
        return [
            'package_id' => 'required|exists:packages,id',

        ];
    }
}
