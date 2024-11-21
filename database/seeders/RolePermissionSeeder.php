<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus cache permission sebelumnya
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Ambil role dari Spatie
        $RoleAdmin = Role::findByName('Admin');
        $RoleManager = Role::findByName('Manager');
        $RoleOperator = Role::findByName('Operator');

        // Ambil data dari tabel role_has_menu_permissions
        $roleHasMenuPermissions = DB::table('role_has_menu_permissions')->get();

        // Assign permission untuk setiap role berdasarkan data di role_has_menu_permissions
        foreach ($roleHasMenuPermissions as $record) {
            // Ambil data menu dari tabel 'menus' berdasarkan menu_id
            $menu = DB::table('menus')->where('id', $record->menu_id)->first();

            foreach (['read', 'edit', 'create', 'delete', 'print', 'upload'] as $permission) {
                if ($record->{$permission}) {
                    $permName = "{$permission}-{$menu->slug}";

                    // Beri permission kepada admin (role_id = 1)
                    if ($record->role_id == 1) {
                        $RoleAdmin->givePermissionTo($permName);
                    }
                    if ($record->role_id == 2) {
                        $RoleManager->givePermissionTo($permName);  
                    }
                    if ($record->role_id == 3) {
                        $RoleOperator->givePermissionTo($permName);
                    }
                }
            }
        }
    }
}
