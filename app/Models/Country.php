<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public array $searchable = [''];
    public array $filterable = ['is_active'];
    public array $allowedFields = ['id', 'name_ar', 'name_en', 'code', 'is_active', 'created_at', 'updated_at'];

    //
}
