<?php
namespace Caydeesoft\Permission\Helpers;

use Illuminate\Support\Facades\Auth;

class Helpers
    {
    
        public static function can_access($routename)
            {
                if (Auth::user()->permission->contains('name',$routename))
                    {
                        return true;
                    }
                return false;
            }
        
    }



