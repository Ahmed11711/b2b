<?php

namespace App\Http\Requests\Admin\verification;

use App\Http\Requests\BaseRequest\BaseRequest;

class verificationUpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            // First two: Images only
            'id_card_front'       => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:5120',
            'id_card_back'        => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:5120',

            // Second two: Files (PDF or Images)
            'commercial_register' => 'sometimes|nullable|file|mimes:pdf,jpeg,png,jpg|max:10240',
            'tax_card'            => 'sometimes|nullable|file|mimes:pdf,jpeg,png,jpg|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            // ID Card Front
            'id_card_front.required'    => 'The ID card front image is required.',
            'id_card_front.image'       => 'The ID card front must be a valid image file.',
            'id_card_front.mimes'       => 'The ID card front must be a file of type: jpeg, png, jpg.',

            // ID Card Back
            'id_card_back.required'     => 'The ID card back image is required.',
            'id_card_back.image'        => 'The ID card back must be a valid image file.',
            'id_card_back.mimes'        => 'The ID card back must be a file of type: jpeg, png, jpg.',

            // Commercial Register
            'commercial_register.required' => 'The commercial register file is required.',
            'commercial_register.file'     => 'The commercial register must be a valid file.',
            'commercial_register.mimes'    => 'The commercial register must be a PDF or an image (jpeg, png, jpg).',

            // Tax Card
            'tax_card.required' => 'The tax card file is required.',
            'tax_card.file'     => 'The tax card must be a valid file.',
            'tax_card.mimes'    => 'The tax card must be a PDF or an image (jpeg, png, jpg).',

            // General Max Size
            '*.max' => 'The file size is too large. Maximum allowed is 5MB for images and 10MB for documents.',
        ];
    }
}
