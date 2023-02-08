<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()

     {

        //    
    }
    public $key = 'user';
}
