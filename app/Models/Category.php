<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public array $searchable = [''];
    public array $filterable = ['is_active'];
    public array $allowedFields = ['id', 'name', 'name_ar', 'image', 'sort_order', 'is_active', 'created_at', 'updated_at'];

    //
}
