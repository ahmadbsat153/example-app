<?php

namespace App\Policies;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierPolicy
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
        //
        if($user->role_id==1 || $user->role_id==5){
            return true;
        }
        else if($user->role_id==2){
            return true;
        }
        else if($user->role_id==3){
            return true;
        }else if($user->role_id==4){
            return true;
        }else if($user->role_id==5){
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Supplier $supplier)
    {
        //
        if($user->role_id==1 || $user->role_id==5){
            return true;
        }
        else if($user->role_id==2){
            return true;
        }
        else if($user->role_id==3){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        if($user->role_id==1 || $user->role_id==5 || $user->role_id==5){
            return true;
        }
        else if($user->role_id==2){
            return true;
        }
        else if($user->role_id==3){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Supplier $supplier)
    {
        //
        if($user->role_id==1 || $user->role_id==5){
            return true;
        }
        else if($user->role_id==2){
            return true;
        }
        else if($user->role_id==3){
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Supplier $supplier)
    {
        //
        if($user->role_id==1 || $user->role_id==5){
            return true;
        }
        else if($user->role_id==2){
            return false;
        }
        else if($user->role_id==3){
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Supplier $supplier)
    {
        //
        if($user->role_id==1 || $user->role_id==5){
            return true;
        }
        else if($user->role_id==2){
            return false;
        }
        else if($user->role_id==3){
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Supplier $supplier)
    {
        //
        if($user->role_id==1 || $user->role_id==5){
            return true;
        }
        else if($user->role_id==2){
            return false;
        }
        else if($user->role_id==3){
            return false;
        }
    }
}
