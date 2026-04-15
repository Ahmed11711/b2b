<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceContact extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function userContact()
    {
        return $this->belongsTo(UserContact::class, 'user_contact_id');
    }
}
