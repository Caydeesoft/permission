<?php

namespace Caydeesoft\Permission\Models;

use Caydeesoft\Permission\Casts\JsonCast;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
    {
        public $timestamps = false;

        protected $fillable = ['name','access_level','permission_group_id', 'action'];
        protected $casts =  [
                                'access_level'=>JsonCast::class
                            ];

        public function roles()
            {
                return $this->belongsToMany(Role::class);
            }
    }
