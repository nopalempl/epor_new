<?php

namespace App\Http\Controllers;

use App\Models\DaftarUsaha;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $daftar_usaha = DaftarUsaha::all();
        $users = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->select(
                'users.*',
                'roles.name as role_name'
            )
            ->orderBy('users.role_id', 'asc')
            ->get();

        $daftar_usaha = DaftarUsaha::leftJoin('users', 'daftar_usaha.id', '=', 'users.daftar_id')
            ->whereNull('users.daftar_id')
            ->select('daftar_usaha.id', 'daftar_usaha.nama', 'daftar_usaha.email')
            ->get();

        return view('pages.manajemen-user', compact('users', 'roles', 'daftar_usaha'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'status_aktif' => 'required|integer|in:0,1',
        ]);

        // Buat user baru
        $user = new User();
        $user->username = $request->username;
        $daftar_usaha = DaftarUsaha::find($request->fullname);
        $user->fullname = $daftar_usaha->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->daftar_id = $request->fullname;
        $user->role_id = $request->role_id;

        if ($request->role_id == 1) {

            $user->assignRole('admin');
        } elseif ($request->role_id == 2) {
            $user->assignRole('manager');
        } elseif ($request->role_id == 3) {
            $user->assignRole('operator');
        } else {
            return response()->json(['error' => 'Role not found'], 404);
        }

        $user->status_aktif = $request->status_aktif;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'status_aktif' => 'required|integer|in:0,1',
        ]);


        $user = User::findOrFail($id);


        $user->username = $request->input('username');
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');

        if ($request->role_id == 1) {
            $user->assignRole('admin');
        } elseif ($request->role_id == 2) {
            $user->assignRole('manager');
        } elseif ($request->role_id == 3) {
            $user->assignRole('operator');
        } else {
            return response()->json(['error' => 'Role not found'], 404);
        }
        $user->status_aktif = $request->input('status_aktif');
        $user->save();

        return response()->json(['message' => 'User updated successfully!']);
    }
    public function toggleStatus($id, Request $request)
    {
        try {
            $user = User::findOrFail($id);
            $user->status_aktif = $request->status_aktif;
            $user->save();

            return response()->json(['message' => 'Status berhasil diubah.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengubah status.'], 500);
        }
    }
    public function destroy($id)
    {

        $user = user::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'user berhasil dihapus!');
    }

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('can:read-manajemen-user')->only(['index']);
        $this->middleware('can:create-manajemen-user')->only(['store']);
        $this->middleware('can:edit-manajemen-user')->only(['update', 'edit', 'toggleStatus']);
        $this->middleware('can:delete-manajemen-user')->only(['destroy']);
    }
}
