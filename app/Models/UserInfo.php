<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{

    public array $searchable = ['info'];
    public array $filterable = ['user_id', 'country_id', 'city_id'];
    public array $allowedFields = ['id', 'user_id', 'country_id', 'city_id', 'info', 'created_at', 'updated_at'];

    //

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}