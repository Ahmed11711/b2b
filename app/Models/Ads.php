<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    public array $searchable = [''];
    public array $filterable = [''];
    public array $allowedFields = ['id', 'title', 'title_ar', 'image', 'created_at', 'updated_at'];

    //
}
