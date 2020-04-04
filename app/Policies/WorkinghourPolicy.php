<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workinghour;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkinghourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any workinghours.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->type == User::ADMIN_TYPE || $user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can view the workinghour.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Workinghour $workinghour
     * @return mixed
     */
    public function view(User $user, Workinghour $workinghour)
    {
        return $user->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user can create workinghours.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type == User::ADMIN_TYPE || $user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can update the workinghour.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Workinghour $workinghour
     * @return mixed
     */
    public function update(User $user, Workinghour $workinghour)
    {
        return $user->type == User::ADMIN_TYPE || $user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can delete the workinghour.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Workinghour $workinghour
     * @return mixed
     */
    public function delete(User $user, Workinghour $workinghour)
    {
        return $user->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user can restore the workinghour.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Workinghour $workinghour
     * @return mixed
     */
    public function restore(User $user, Workinghour $workinghour)
    {
        return $user->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user can permanently delete the workinghour.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Workinghour $workinghour
     * @return mixed
     */
    public function forceDelete(User $user, Workinghour $workinghour)
    {
        return $user->type == User::ADMIN_TYPE;
    }
}
