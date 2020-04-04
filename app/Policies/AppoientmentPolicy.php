<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Appoientment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppoientmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any appoientments.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->type == User::ADMIN_TYPE || $user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can view the appoientment.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Appoientment $appoientment
     * @return mixed
     */
    public function view(User $user, Appoientment $appoientment)
    {
        return $user->type == User::ADMIN_TYPE || $user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can create appoientments.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type == User::ADMIN_TYPE || $user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can update the appoientment.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Appoientment $appoientment
     * @return mixed
     */
    public function update(User $user, Appoientment $appoientment)
    {
        return $user->type == User::ADMIN_TYPE || $user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can delete the appoientment.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Appoientment $appoientment
     * @return mixed
     */
    public function delete(User $user, Appoientment $appoientment)
    {
        return $user->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user can restore the appoientment.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Appoientment $appoientment
     * @return mixed
     */
    public function restore(User $user, Appoientment $appoientment)
    {
        return $user->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user can permanently delete the appoientment.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Appoientment $appoientment
     * @return mixed
     */
    public function forceDelete(User $user, Appoientment $appoientment)
    {
        return $user->type == User::ADMIN_TYPE;
    }
}
