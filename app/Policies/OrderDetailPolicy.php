<?php

namespace App\Policies;

use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderDetailPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('Orderdetail_viewAny');
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OrderDetail $orderDetail): bool
    {
        return $user->hasPermission('Orderdetail_view');
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('Orderdetail_create');
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OrderDetail $orderDetail): bool
    {
        return $user->hasPermission('Orderdetail_update');
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OrderDetail $orderDetail): bool
    {   
        return $user->hasPermission('Orderdetail_delete');
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OrderDetail $orderDetail): bool
    {
        return $user->hasPermission('Orderdetail_restore');
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OrderDetail $orderDetail): bool
    {
        return $user->hasPermission('Orderdetail_forceDelete');
        //
    }
    public function viewTrash(User $user)
   {
        return $user->hasPermission('Orderdetail_viewTrash');
        //
   }
}