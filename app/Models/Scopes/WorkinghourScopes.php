<?php

namespace App\Models\Scopes;

use App\Models\Workinghour;
use Carbon\Carbon;

trait WorkinghourScopes
{
    public static function scopeGetAvailableDates($query)
    {
        $query->where('date', '>', Carbon::yesterday());
    }



}
