<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class permission extends SpatiePermission
{
    public function permission()
    {
         return $this->belongsToMany(Role::class);
    }
}