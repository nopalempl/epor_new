<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleHasMenuPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Membuat role menggunakan Spatie
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Operator']);
        
        // Ambil semua role dari tabel 'roles'
        $roles = DB::table('roles')->get();

        // Ambil semua menu dari tabel 'menus'
        $menus = DB::table('menus')->get();

        // Definisikan permissions
        $permissions = ['read', 'edit', 'create', 'delete', 'print', 'upload'];

        // Array untuk menyimpan data role_has_menu_permissions
        $data = [];

        // Loop untuk setiap role dan menu
        foreach ($roles as $role) {
            foreach ($menus as $menu) {
                // Siapkan record role-menu-permission untuk diinsert
                $roleMenuPermissions = [
                    'role_id' => $role->id,
                    'menu_id' => $menu->id,
                    'read'    => true,
                    'edit'    => true,
                    'create'  => true,
                    'delete'  => true,
                    'print'   => true,
                    'upload'  => true,
                ];

                // Simpan data untuk tabel role_has_menu_permissions
                $data[] = $roleMenuPermissions;

                // Buat permission untuk setiap role dan menu
                foreach ($permissions as $permission) {
                    $permName = "{$permission}-{$menu->slug}";

                    // Buat permission jika belum ada di tabel permissions
                    if (!Permission::where('name', $permName)->exists()) {
                        Permission::create(['name' => $permName]);
                    }
                }
            }
        }

        // Insert data ke tabel role_has_menu_permissions
        DB::table('role_has_menu_permissions')->insert($data);
    }
}
