<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPacakges extends Model
{

    public array $searchable = [''];
    public array $filterable = ['user_id', 'package_id', 'active'];
    public array $allowedFields = ['id', 'user_id', 'package_id', 'starts_at', 'ends_at', 'active', 'created_at', 'updated_at'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}