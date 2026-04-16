<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BagItems extends Model
{

    public array $searchable = ['desc', 'Whose'];
    public array $filterable = [''];
    public array $allowedFields = ['id', 'title', 'image', 'rating', 'desc', 'Whose', 'created_at', 'updated_at'];

    //
}
