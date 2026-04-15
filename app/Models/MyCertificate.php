<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCertificate extends Model
{

    public array $searchable = ['description'];
    public array $filterable = ['user_id'];
    public array $allowedFields = ['id', 'user_id', 'title', 'issue_date', 'image', 'description', 'created_at', 'updated_at'];

    //

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}