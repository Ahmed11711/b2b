<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPacakgesFeatures extends Model
{
    public function packageFeature(): BelongsTo
    {

        return $this->belongsTo(PackageFeature::class, 'package_feature_id');
    }
}
