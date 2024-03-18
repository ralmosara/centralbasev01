<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\System;
use App\Models\User;

class SystemPolicy
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
    public function view(User $user, System $system): bool
    {
        return $user->hasRole(['Admin','Viewer']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, System $system): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, System $system): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, System $system): bool
    {
        return $user->can('restore System');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, System $system): bool
    {
        return $user->can('force-delete System');
    }
}
