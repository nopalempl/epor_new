<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
      // Membuat admin
$Admin = User::create([
  'username' => 'admin',
  'fullname' => 'Administrator', // Pastikan untuk menambahkan fullname
  'email' => 'admin@gmail.com',
  'password' => bcrypt('admin'),
  'status_aktif' => 1, // Status aktif (1 = aktif)
  'role_id' => 1 // Pastikan role_id sesuai dengan id role admin
]);
$Admin->assignRole('Admin'); // Mengaitkan role admin

// Membuat manager biasa
$Manager = User::create([
  'username' => 'aby',
  'fullname' => 'Aby', // Pastikan untuk menambahkan fullname
  'email' => 'aby@gmail.com',
  'password' => bcrypt('aby'),
  'status_aktif' => 1, // Status aktif (1 = aktif)
  'role_id' => 2 // Pastikan role_id sesuai dengan id role user
]);
$Manager->assignRole('Manager'); // Mengaitkan role user
    }
}
