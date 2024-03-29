<?php

namespace App\Policies;

use App\Models\PhoneModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhoneModelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('phonemodels.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneModel  $phoneModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PhoneModel $phoneModel)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('phonemodels.manage');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneModel  $phoneModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PhoneModel $phoneModel)
    {
        return $phoneModel->deleted_at === null
            && $user ->can('phonemodels.manage');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneModel  $phoneModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PhoneModel $phoneModel)
    {
        return $phoneModel->deleted_at ===null
            && $user->can('phonemodels.manage');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneModel  $phoneModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PhoneModel $phoneModel)
    {
        return $phoneModel->deleted_at !== null
            && $user->can('phonemodels.manage');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneModel  $phoneModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PhoneModel $phoneModel)
    {
        //
    }
}
