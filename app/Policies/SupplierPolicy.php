<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class SupplierPolicy
{

    public function __construct()

     {

        //    
    }
    public $key = 'supplier';
}
