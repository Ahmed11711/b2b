<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    public array $filterable = ['user_id', 'status'];

    protected $fillable = [
        'user_id',
        'id_card_front',
        'id_card_back',
        'commercial_register',
        'tax_card',
        'notes',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
