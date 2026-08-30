<?php

namespace App\Models;

use \App\Models\bids;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    public array $searchable = ['description'];
    public array $filterable = ['user_id', 'is_active', 'category_id'];
    public array $allowedFields = ['id', 'user_id', 'title', 'description', 'price_from', 'price_to', 'image', 'is_active', 'created_at', 'updated_at'];

    //
    public function userBid()
    {
        return $this->hasOne(bids::class, 'post_id', 'id')
            ->where('user_id', auth('api')->id());
    }

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
    public function contacts()
    {
        return $this->hasMany(ServiceContact::class, 'service_id', 'id')
            ->where('type', 'posts');
    }
    public function views()
    {
        return $this->hasMany(PostView::class);
    }
}
