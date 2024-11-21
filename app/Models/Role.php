<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function role_has_menu_permissions()
    {
        return $this->hasMany(RHMP::class);
    }
    
}