<?php

namespace App\Http\Resources\Admin\Service;

use App\Http\Resources\Admin\Category\CategoryResource;
use App\Http\Resources\Admin\User\UserResource;
use App\Http\Resources\Api\ReviewsResource;
use App\Http\Resources\Api\ServiceContact\ServiceContactResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Service
 */
class ServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $attributes = $this->resource->getAttributes();
        $data = ['id' => $this->id];
        $fields = ['user_id', 'category_id', 'city_id', 'title', 'desc', 'image', 'price', 'is_active', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $data[$field] = $this->{$field};
            }
        }

        // تنضيف الوصف: فك الكيانات (&nbsp;) وإزالة الوسوم HTML للعرض كنص عادي
        if (isset($data['desc'])) {
            $data['desc'] = $this->cleanDescription($data['desc']);
        }

        $data['image'] = $this->image
            ? url(str_replace('/storage/app/public', '/storage', $this->image))
            : null;

        $data['views_count'] = $this->visits_count ?? 0;
        $data['user'] = new UserResource($this->whenLoaded('user'));
        $data['category'] = new CategoryResource($this->whenLoaded('category'));
        $data['contacts'] = ServiceContactResource::collection($this->whenLoaded('contacts'));
        $data['reviews'] = ReviewsResource::collection($this->whenLoaded('reviews'));
        $data['visits'] = $this->whenLoaded('visits');

        return $data;
    }

    /**
     * تنظيف الوصف من وسوم HTML وفك الكيانات المشفرة
     */
    protected function cleanDescription(?string $desc): ?string
    {
        if (!$desc) {
            return null;
        }

        // فك الكيانات زي &nbsp; &amp; &quot; ... إلخ
        $decoded = html_entity_decode($desc, ENT_QUOTES, 'UTF-8');

        // إزالة وسوم HTML بالكامل (<p>, <br>, ...)
        $stripped = strip_tags($decoded);

        // إزالة المسافات الزيادة الناتجة عن &nbsp; -> space متكررة
        $clean = preg_replace('/\s+/u', ' ', $stripped);

        return trim($clean);
    }
}
