<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    public array $searchable = ['description'];
    public array $filterable = ['user_id', 'category_id', 'status', 'active', 'is_featured'];
    public array $allowedFields = ['id', 'user_id', 'category_id', 'status', 'title', 'title_ar', 'description', 'image', 'attachment_file', 'price', 'active', 'is_featured', 'published_at', 'expire_date', 'created_at', 'updated_at'];

    //

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}