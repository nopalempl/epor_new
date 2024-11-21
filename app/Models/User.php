<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Role;


class User extends Authenticatable
{
    use HasRoles, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'status_aktif',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(\Spatie\Permission\Models\Role::class, 'role_id');
    }
   
    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission);
    }
}
