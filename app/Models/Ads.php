<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    public array $searchable = ['description'];
    public array $filterable = ['category_id', 'status', 'is_active'];
    public array $allowedFields = ['id', 'category_id', 'status', 'title', 'description', 'image', 'is_active', 'created_at', 'updated_at'];

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