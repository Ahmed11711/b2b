<?php

namespace App\Http\Requests\Admin\verification;

use App\Http\Requests\BaseRequest\BaseRequest;
use App\Models\Verification;

class verificationUpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'id_card_front'       => 'sometimes|image',
            'id_card_back'        => 'sometimes|image',
            'commercial_register' => 'sometimes|file',
            'tax_card'            => 'sometimes|file',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $record = Verification::where('user_id', auth('api')->id())->first();

            if ($record && $record->status === 'approved') {
                $validator->errors()->add('status', 'Your verification is already approved. You cannot edit it.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'id_card_front.image'          => 'The ID card front must be a valid image file.',
            'id_card_back.image'           => 'The ID card back must be a valid image file.',
            'commercial_register.file'     => 'The commercial register must be a valid file.',
            'tax_card.file'                => 'The tax card must be a valid file.',
            '*.max' => 'The file size is too large. Maximum allowed is 5MB for images and 10MB for documents.',
        ];
    }
}
