<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RHMP extends Model
{
    use HasFactory;
    protected $table = 'role_has_menu_permissions';
    protected $fillable = [
        'role_id',
        'menu_id',       
        'read',
        'edit',
        'create',   
        'delete',
        'print',
        'upload',        
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); 
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}

