<?php

namespace App\Policies;

use App\Organisation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganisationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any organisations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role_id>2;
    }

    /**
     * Determine whether the user can view the organisation.
     *
     * @param  \App\User  $user
     * @param  \App\Organisation  $organisation
     * @return mixed
     */
    public function view(User $user, Organisation $organisation)
    {
        return $user->organisation_id === $organisation->id;
    }

    /**
     * Determine whether the user can create organisations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the organisation.
     *
     * @param  \App\User  $user
     * @param  \App\Organisation  $organisation
     * @return mixed
     */
    public function update(User $user, Organisation $organisation)
    {
        //
    }

    /**
     * Determine whether the user can delete the organisation.
     *
     * @param  \App\User  $user
     * @param  \App\Organisation  $organisation
     * @return mixed
     */
    public function delete(User $user, Organisation $organisation)
    {
        //
    }

    /**
     * Determine whether the user can restore the organisation.
     *
     * @param  \App\User  $user
     * @param  \App\Organisation  $organisation
     * @return mixed
     */
    public function restore(User $user, Organisation $organisation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the organisation.
     *
     * @param  \App\User  $user
     * @param  \App\Organisation  $organisation
     * @return mixed
     */
    public function forceDelete(User $user, Organisation $organisation)
    {
        //
    }
}
