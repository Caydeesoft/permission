<?php
namespace Caydeesoft\Permission\Helpers;

use Illuminate\Support\Facades\Auth;




if(!function_exists('can_access'))
    {
        function can_access($routename)
            {
                if (Auth::user()->permission->contains('name',$routename))
                    {
                        return true;
                    }
                return false;
            }
    }
