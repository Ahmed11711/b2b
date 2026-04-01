<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{

    public array $searchable = ['info'];
    public array $filterable = ['country_id', 'city_id'];
    public array $allowedFields = ['id', 'country_id', 'city_id', 'info', 'created_at', 'updated_at'];

    //

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}