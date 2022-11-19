<?php

namespace Caydeesoft\Permission\Traits;

use Caydeesoft\Permission\Models\Role;
use Caydeesoft\Permission\Models\PermissionRole;
use Caydeesoft\Permission\Models\Permission;

trait HasRoles
{
    public function role()
        {
            return $this->belongsTo(Role::class);
        }
    
    public function getRoleNameAttribute()
        {
            return $this->role()->first()->name ?? null ;
        }
    public function permission()
        {
            return $this->hasManyThrough(Permission::class,PermissionRole::class,'role_id','id','role_id','permission_id');
        }
}
