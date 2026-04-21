<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPacakges extends Model
{
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
