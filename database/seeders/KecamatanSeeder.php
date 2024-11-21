<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder{
    public function run(){
        $kecamatan = [
            ['id' => 1, 'kd_kecamatan' => '28', 'nm_kecamatan' => 'PONDOK MELATI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'kd_kecamatan' => '39', 'nm_kecamatan' => 'BEKASI TIMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'kd_kecamatan' => '34', 'nm_kecamatan' => 'PONDOK GEDE', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'kd_kecamatan' => '35', 'nm_kecamatan' => 'JATIASIH', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'kd_kecamatan' => '36', 'nm_kecamatan' => 'BEKASI SELATAN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'kd_kecamatan' => '37', 'nm_kecamatan' => 'BEKASI UTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'kd_kecamatan' => '38', 'nm_kecamatan' => 'BEKASI BARAT', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'kd_kecamatan' => '40', 'nm_kecamatan' => 'LUAR KOTA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'kd_kecamatan' => '31', 'nm_kecamatan' => 'RAWALUMBU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'kd_kecamatan' => '32', 'nm_kecamatan' => 'JATISAMPURNA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'kd_kecamatan' => '29', 'nm_kecamatan' => 'MUSTIKAJAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'kd_kecamatan' => '33', 'nm_kecamatan' => 'BANTARGEBANG', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'kd_kecamatan' => '30', 'nm_kecamatan' => 'MEDAN SATRIA', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach($kecamatan as $kecamatan){
            DB::table('kecamatan')->insert($kecamatan);
        }
    }




}