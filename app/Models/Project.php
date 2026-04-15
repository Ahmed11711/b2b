<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public array $searchable = ['description'];
    public array $filterable = ['user_id'];
    public array $allowedFields = ['id', 'user_id', 'title', 'project_date', 'image', 'description', 'created_at', 'updated_at'];

    //

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contacts()
    {
        return $this->hasMany(ServiceContact::class, 'service_id', 'id');
    }
}
