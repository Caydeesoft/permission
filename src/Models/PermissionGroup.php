<?php

namespace Caydeesoft\Permission\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
    {

        protected $fillable = ['name','parent_id'];

        public function permissions()
            {
                return $this->hasMany(Permission::class);
            }
        public function children()
            {
                return $this->hasMany(PermissionGroup::class,'parent_id','id');
            }


    }
