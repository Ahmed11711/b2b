<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BagItems extends Model
{

    public array $searchable = ['desc', 'Whose', 'what_will_you_get'];
    public array $filterable = ['bags_categories_id', 'currency'];
    public array $allowedFields = ['id', 'bags_categories_id', 'title', 'price', 'image', 'currency', 'rating', 'desc', 'Whose', 'what_will_you_get', 'created_at', 'updated_at'];

    //

    public function bagsCategories()
    {
        return $this->belongsTo(BagsCategory::class, 'bags_categories_id');
    }



    public function gallery()
    {
        return $this->hasMany(BagItemsImage::class, 'bag_items_id', 'id');
    }
}
