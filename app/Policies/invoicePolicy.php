<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class invoicePolicy
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
        if($user->role_id==1){
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
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Invoice $invoice)
    {
        //
        if($user->role_id==1){
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
        if($user->role_id==1){
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
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Invoice $invoice)
    {
        
        if($user->role_id==1){
            return false;
        }
        else if($user->role_id==2){
            return true;
        }
        else if($user->role_id==3){
            return true;
        }
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    // public function delete(User $user, Invoice $invoice)
    // {
    //     //
    //     if($user->role_id==1){
    //         return true;
    //     }
    //     else if($user->role_id==2){
    //         return true;
    //     }
    //     else if($user->role_id==3){
    //         return true;
    //     }
    // }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Invoice $invoice)
    {
        //
        if($user->role_id==1){
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
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Invoice $invoice)
    {
        //
        if($user->role_id==1){
            return true;
        }
        else if($user->role_id==2){
            return true;
        }
        else if($user->role_id==3){
            return true;
        }
    }
}
