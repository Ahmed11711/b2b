<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public array $searchable = [''];
    public array $filterable = ['country_id', 'is_active'];
    public array $allowedFields = ['id', 'country_id', 'name_ar', 'name_en', 'is_active', 'created_at', 'updated_at'];

    //

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}