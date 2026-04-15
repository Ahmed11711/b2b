<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    public array $searchable = [''];
    public array $filterable = ['user_id'];
    public array $allowedFields = ['id', 'user_id', 'title', 'address', 'mobile', 'lat', 'lng', 'created_at', 'updated_at'];

    //

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}