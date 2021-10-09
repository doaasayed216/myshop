<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role_id === Role::IS_ADMIN;
    }

    public function delete(User $user, Order $order)
    {
        return $user->role_id === Role::IS_ADMIN || $order->user_id === $user->id;
    }

    public function update(User $user, Order $order)
    {
        return $user->role_id === Role::IS_ADMIN;
    }

}
