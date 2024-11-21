<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get the roles that can access this menu.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_menu_permissions');
    }
}
