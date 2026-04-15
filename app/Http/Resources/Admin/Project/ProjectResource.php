<?php

namespace App\Http\Resources\Admin\Project;

use App\Http\Resources\Api\ServiceContact\ServiceContactResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Project
 */
class ProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'title', 'project_date', 'image', 'description', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        $data['contacts'] = ServiceContactResource::collection($this->whenLoaded('contacts'));


        return $data;
    }
}
