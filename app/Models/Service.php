<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    public array $searchable = [''];
    public array $filterable = ['user_id', 'category_id', 'city_id'];
    public array $allowedFields = ['id', 'user_id', 'category_id', 'city_id', 'title', 'desc', 'image', 'price', 'created_at', 'updated_at'];

    //

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    // App\Models\Service.php

    public function gallery()
    {
        return $this->hasMany(ServiceImage::class, 'service_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function contacts()
    {
        return $this->hasMany(ServiceContact::class, 'service_id', 'id');
    }
}
