<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    public array $searchable = ['description'];
    public array $filterable = ['active'];
    public array $allowedFields = ['id', 'name', 'description', 'price', 'active', 'duration_months', 'created_at', 'updated_at'];

    //
}
