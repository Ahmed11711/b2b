<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    public array $searchable = ['description'];
    public array $filterable = ['user_id', 'is_active'];
    public array $allowedFields = ['id', 'user_id', 'title', 'description', 'price_from', 'price_to', 'image', 'is_active', 'created_at', 'updated_at'];

    //

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gallery()
    {
        return $this->hasMany(PostsImage::class, 'post_id');
    }

    public function bids()
    {
        return $this->hasMany(bids::class, 'post_id');
    }
}
