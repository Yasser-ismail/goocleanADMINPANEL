<?php

namespace App\Models\Scopes;

use App\Models\Time;

trait TimeScopes
{
    public static function scopeAvailableTime($query)
    {
        $query->where('reserved', 0);
    }
}
