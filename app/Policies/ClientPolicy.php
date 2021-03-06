<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Client;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any clients.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->type == User::ADMIN_TYPE ||$user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can view the client.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Client $client
     * @return mixed
     */
    public function view(User $user, Client $client)
    {
        return $user->type == User::ADMIN_TYPE ||$user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can create clients.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type == User::ADMIN_TYPE ||$user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can update the client.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Client $client
     * @return mixed
     */
    public function update(User $user, Client $client)
    {
        return $user->type == User::ADMIN_TYPE ||$user->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user can delete the client.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Client $client
     * @return mixed
     */
    public function delete(User $user, Client $client)
    {
        return $user->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user can restore the client.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Client $client
     * @return mixed
     */
    public function restore(User $user, Client $client)
    {
        return $user->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user can permanently delete the client.
     *
     * @param  \App\Models\User $user
     * @param \App\Models\Client $client
     * @return mixed
     */
    public function forceDelete(User $user, Client $client)
    {
        return $user->type == User::ADMIN_TYPE;
    }
}
