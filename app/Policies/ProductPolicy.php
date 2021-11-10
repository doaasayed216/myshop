<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_SELLER]);
    }

    public function create(User $user)
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_SELLER]);
    }

    public function update(User $user, Product $product)
    {
        return $user->role_id == Role::IS_ADMIN || $product->user_id == $user->id;
    }

    public function delete(User $user, Product $product)
    {
        return $user->role_id == Role::IS_ADMIN || $product->user_id == $user->id;
    }
}
