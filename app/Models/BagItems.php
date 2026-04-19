<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BagItems extends Model
{

    public array $searchable = ['desc', 'Whose', 'what_will_you_get'];
    public array $filterable = ['currency'];
    public array $allowedFields = ['id', 'title', 'price', 'image', 'currency', 'rating', 'desc', 'Whose', 'what_will_you_get', 'created_at', 'updated_at'];

    //
}
