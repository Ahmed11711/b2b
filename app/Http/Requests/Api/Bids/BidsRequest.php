<?php

namespace App\Http\Requests\Api\Bids;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BidsRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'post_id' => 'required|exists:posts,id'
        ];
    }
}
