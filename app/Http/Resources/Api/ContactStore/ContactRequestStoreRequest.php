<?php

namespace App\Http\Resources\Api\ContactStore;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactRequestStoreRequest extends BaseRequest
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'provider_id'      => ['required', 'integer', 'exists:users,id'],
            'service_id'       => ['nullable', 'integer', 'exists:services,id'],
            'project_id'       => ['nullable', 'integer', 'exists:projects,id'],
            'user_contact_id'  => ['required', 'integer', 'exists:user_contacts,id'],
        ];
    }
}
