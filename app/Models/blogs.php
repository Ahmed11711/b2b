<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model {

    public array $searchable = ['desc'];
    public array $filterable = ['active', 'user_id', 'status'];
    public array $allowedFields = ['id', 'title', 'title_ar', 'desc', 'active', 'user_id', 'image', 'status', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}