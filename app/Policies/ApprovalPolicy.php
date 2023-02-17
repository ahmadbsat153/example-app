<?php

namespace App\Policies;
use App\Models\Invoice;
use App\Models\Approval;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApprovalPolicy
{
    use HandlesAuthorization;



    public function viewAny(User $user)
    {
        //
        if($user->role_id==1 || $user->role_id==5 ){
            return true;
        }
    }


    public function view(User $user, Approval $approval)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user)
    {
        if($user->role_id==1 || $user->role_id==5){
            return true;
        }
    }


    public function delete(User $user, Approval $approval)
    {
        //
    }


    public function restore(User $user, Approval $approval)
    {
        //
    }

    public function forceDelete(User $user, Approval $approval)
    {
        //
    }
}
