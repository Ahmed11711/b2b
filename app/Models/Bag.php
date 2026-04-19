<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{

    public array $searchable = [''];
    public array $filterable = ['free'];
    public array $allowedFields = ['id', 'title', 'image', 'icon', 'free', 'created_at', 'updated_at'];

    //
    public function bagCategory()
    {
        return $this->hasMany(BagsCategory::class, 'bag_id');
    }
}
