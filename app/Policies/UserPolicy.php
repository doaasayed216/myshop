<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role_id === Role::IS_ADMIN;
    }

    public function create(User $user)
    {
        return $user->role_id === Role::IS_ADMIN;
    }

    public function update(User $user)
    {
        return $user->role_id === Role::IS_ADMIN;
    }

    public function delete(User $user)
    {
        return $user->role_id === Role::IS_ADMIN;
    }
}
