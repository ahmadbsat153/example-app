<?php

namespace App\Policies;
use App\Models\Invoice;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }
    public function view(User $user, Bill $bill)
    {
        //
    }
    public function create(User $user)
    {
        //
    }
    public function update(User $user)
    {
        if($user->role_id==1){
            return true;
        }else
        if($user->role_id==2){
            return true;
        }else
        if($user->role_id==3){
            return true;
        }
    }


    public function delete(User $user, Bill $bill)
    {
        //
        return false;
    }


    public function restore(User $user, Bill $bill)
    {
        //
    }


    public function forceDelete(User $user, Bill $bill)
    {
        //
    }
}
