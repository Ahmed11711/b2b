<?php

namespace App\Http\Requests\Api\Reviews;

use App\Http\Requests\BaseRequest\BaseRequest;

class ReviewsRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'service_id' => 'sometimes|nullable|exists:services,id',
            'provider_id' => 'required|exists:users,id',
            'rating'     => 'required|integer|min:1|max:5',

            'comment'    => 'required|string|min:3|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.exists' => 'The selected service is invalid.',
            'rating.min'        => 'The rating must be at least 1.',
            'rating.max'        => 'The rating cannot be more than 5.',
            'comment.required'  => 'Please write your review comment.',
        ];
    }
}
