<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Rule;
use App\Models\User;

class RulePolicy
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
    public function view(User $user, Rule $rule): bool
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
    public function update(User $user, Rule $rule): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Rule $rule): bool
    {
        return $user->can('delete Rule');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Rule $rule): bool
    {
        return $user->can('restore Rule');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Rule $rule): bool
    {
        return $user->can('force-delete Rule');
    }
}
