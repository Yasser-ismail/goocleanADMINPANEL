<?php

namespace App\Models\Scopes;

use App\Models\User;

/**
 * Trait UserScopes
 * @package App\Models\Scopes
 */
trait UserScopes
{

    /**
     * Scope the query to exclude root users.
     * @param $query
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    public function scopeExceptAdmin($query)
    {
        return $query->where('id', '!=', User::ROOT_TYPE);
    }

    /**
     * Scope the query to exclude Supervisor users.
     * @param $query
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    public function scopeExceptSupervisors($query)
    {
        return $query->where('type','!=',User::SUPERVISOR_TYPE);
    }
}
