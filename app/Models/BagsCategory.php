<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BagsCategory extends Model
{

    public array $searchable = [''];
    public array $filterable = ['bag_id'];
    public array $allowedFields = ['id', 'bag_id', 'title', 'image', 'created_at', 'updated_at'];

    //

    public function bag()
    {
        return $this->belongsTo(Bag::class, 'bag_id');
    }

}