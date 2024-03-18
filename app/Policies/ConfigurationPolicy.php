<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Configuration;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;

class ConfigurationPolicy
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
    public function view(User $user, Configuration $configuration): bool
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
    public function update(User $user, Configuration $configuration): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */

    
    public function delete(User $user, Configuration $configuration): bool
    {
        return $user->hasRole('Admin');
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Configuration $configuration): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Configuration $configuration): bool
    {
           if ($user->hasRole('Admin')) {
            return true;
        }
    }

    public function forceDeleteAny(User $user, Configuration $configuration): bool
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }



     


    
}
