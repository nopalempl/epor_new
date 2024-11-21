<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\RoleHasMenuPermissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\RHMP;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $role_has_menu_permissions = RHMP::with(['menu'])->get();
        return view('pages.manajemen-level', compact('roles', 'role_has_menu_permissions'));
    }

    public function getPermissions($roleId)
    {
        $permissions = RHMP::with('menu')
            ->where('role_id', $roleId)
            ->get();

        return response()->json($permissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create($request->all()); // Menyimpan role ke database


        return redirect()->back()->with('success', 'Role berhasil ditambahkan!');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);

        $role->name = $request->input('name');
        $role->save(); // Simpan perubahan

        return response()->json(['message' => 'Role updated successfully!']);
    }

    public function savePermission(Request $request, $roleId)
    {
        $role = Role::findById($roleId);
        $permissionsData = $request->input('permissions');

        $allMenus = Menu::all();

        foreach ($allMenus as $menu) {
            $menuId = $menu->id;

            $allPermissions = ['read', 'edit', 'create', 'delete', 'print', 'upload'];


            if (isset($permissionsData[$roleId]) && isset($permissionsData[$roleId][$menuId])) {
                $permissions = $permissionsData[$roleId][$menuId]; // Ambil permission untuk menu ini


                foreach ($allPermissions as $permission) {

                    $permissionName = "{$permission}-{$menu->slug}";


                    $permissionModel = Permission::firstOrCreate(['name' => $permissionName]);


                    if (isset($permissions[$permission]) && $permissions[$permission] === '1') {
                        $role->givePermissionTo($permissionModel);
                    } else {
                        $role->revokePermissionTo($permissionModel);
                    }
                }

                DB::table('role_has_menu_permissions')->updateOrInsert(
                    ['role_id' => $roleId, 'menu_id' => $menuId],
                    [
                        'read' => isset($permissions['read']) && $permissions['read'] === '1' ? 1 : 0,
                        'edit' => isset($permissions['edit']) && $permissions['edit'] === '1' ? 1 : 0,
                        'create' => isset($permissions['create']) && $permissions['create'] === '1' ? 1 : 0,
                        'delete' => isset($permissions['delete']) && $permissions['delete'] === '1' ? 1 : 0,
                        'print' => isset($permissions['print']) && $permissions['print'] === '1' ? 1 : 0,
                        'upload' => isset($permissions['upload']) && $permissions['upload'] === '1' ? 1 : 0
                    ]
                );
            } else {
                foreach ($allPermissions as $permission) {
                    $permissionName = "{$permission}-{$menu->slug}";

                    $permissionModel = Permission::firstOrCreate(['name' => $permissionName]);
                    $role->revokePermissionTo($permissionModel);
                }

                DB::table('role_has_menu_permissions')->updateOrInsert(
                    ['role_id' => $roleId, 'menu_id' => $menuId],
                    [
                        'read' => 0,
                        'edit' => 0,
                        'create' => 0,
                        'delete' => 0,
                        'print' => 0,
                        'upload' => 0
                    ]
                );
            }
        }

        return response()->json(['message' => 'Permissions updated successfully!']);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()->with('success', 'Role berhasil dihapus!');
    }

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('can:read-manajemen-level')->only(['index', 'getPermissions']);
        $this->middleware('can:create-manajemen-level')->only('store');
        $this->middleware('can:edit-manajemen-level')->only('update', 'savePermission');
        $this->middleware('can:delete-manajemen-level')->only('destroy');
    }
}
