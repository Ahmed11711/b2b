<?php

namespace App\Http\Requests\Api\UserContact;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserContactRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'contacts'        => 'required|array',
            'contacts.*.type' => 'required|in:whatsapp,phone,instagram,facebook,telegram,twitter,tiktok,youtube,snapchat,linkedin',
            'contacts.*.value' => 'required|string',
        ];
    }
}
