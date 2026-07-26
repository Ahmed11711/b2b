<?php

namespace App\Http\Requests\Admin\verification;

use App\Http\Requests\BaseRequest\BaseRequest;
use App\Models\Verification;

class verificationStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'id_card_front'       => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'id_card_back'        => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'commercial_register' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
            'tax_card'            => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $exists = Verification::where('user_id', auth('api')->id())->exists();

            if ($exists) {
                $validator->errors()->add('user_id', 'You already have a verification request.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'id_card_front.required'       => 'The ID card front image is required.',
            'id_card_front.image'          => 'The ID card front must be a valid image file.',
            'id_card_front.mimes'          => 'The ID card front must be a file of type: jpeg, png, jpg.',

            'id_card_back.required'        => 'The ID card back image is required.',
            'id_card_back.image'           => 'The ID card back must be a valid image file.',
            'id_card_back.mimes'           => 'The ID card back must be a file of type: jpeg, png, jpg.',

            'commercial_register.required' => 'The commercial register file is required.',
            'commercial_register.file'     => 'The commercial register must be a valid file.',
            'commercial_register.mimes'    => 'The commercial register must be a PDF or an image (jpeg, png, jpg).',

            'tax_card.required' => 'The tax card file is required.',
            'tax_card.file'     => 'The tax card must be a valid file.',
            'tax_card.mimes'    => 'The tax card must be a PDF or an image (jpeg, png, jpg).',

            '*.max' => 'The file size is too large. Maximum allowed is 5MB for images and 10MB for documents.',
        ];
    }
}
