<?php

namespace App\Http\Requests\Admin\Project;

use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'project_date' => 'sometimes|nullable|date',
            'image' => 'sometimes|required|file|image|max:2048',
            'description' => 'sometimes|nullable|string',
            'contact_ids'   => 'sometimes|required|array',
            'contact_ids.*' => [
                'required',
                Rule::exists('user_contacts', 'id')->where(function ($query) {
                    $query->where('user_id', auth('api')->id());
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [

            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'project_date.date' => 'The project date is not a valid date.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image may not be greater than 2048 KB.',
            'contact_ids.required'  => 'You must select at least one contact method.',
            'contact_ids.array'     => 'Contact IDs must be an array.',
            'contact_ids.*.exists'  => 'One or more selected contact IDs are invalid or unauthorized.',

        ];
    }
}
