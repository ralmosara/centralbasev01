<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Procurement;
use App\Models\User;

class ProcurementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin','Viewer']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Procurement $procurement): bool
    {
        return $user->hasRole(['Admin','Viewer']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Procurement');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Procurement $procurement): bool
    {
        return $user->can('update Procurement');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Procurement $procurement): bool
    {
        return $user->can('delete Procurement');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Procurement $procurement): bool
    {
        return $user->can('restore Procurement');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Procurement $procurement): bool
    {
        return $user->can('force-delete Procurement');
    }
}
