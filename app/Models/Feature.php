<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

    public array $searchable = [''];
    public array $filterable = ['type'];
    public array $allowedFields = ['id', 'key', 'lable', 'type', 'created_at', 'updated_at'];

    //
}
