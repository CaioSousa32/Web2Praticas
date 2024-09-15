<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can edit roles.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function editRoles(User $user)
    {
        return $user->role === 'admin';
    }
}
